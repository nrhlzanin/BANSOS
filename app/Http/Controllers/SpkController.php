<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenilaianModel;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\HasilSPK;
use App\Models\PengajuanModel;
use Illuminate\Support\Facades\DB;
use App\Models\WargaModel;
use App\Models\SubCriteria;

class SpkController extends Controller
{
    public $kriteria_id;

    public $name, $min, $max, $bobot;

    //     public function perangkingan()
    // {
    //     // Ambil data kriteria, alternatif, dan sub-kriteria
    //     $kriteria = $this->ambilKriteria();
    //     $pengajuans = PengajuanModel::where('status_pengajuan', 'diterima')->where('status_data', 'tervalidasi')->get();
    //     $sub_kriteria = $this->ambilSemuaSubKriteria(); // Atau $this->ambilSubKriteria($kriteria_id) jika Anda memiliki kriteria ID yang spesifik
    //     $alternatifs = $this->calculatePSI();
    //     //return view('spk.menu', compact('kriteria', 'alternatifs', 'pengajuans', 'sub_kriteria'));
    // }
    public function perangkingan()
    {
        // Ambil data pengajuan dan warga
        $pengajuans = PengajuanModel::with('warga')->get();
        $kriterias = Kriteria::all();

        // Inisialisasi array untuk menyimpan nilai kriteria
        $kriteriaValues = [];

        // Iterasi untuk mengisi nilai kriteria
        foreach ($pengajuans as $pengajuan) {
            $values = [];
            foreach ($kriterias as $kriteria) {
                switch ($kriteria->nama_kriteria) {
                    case 'pekerjaan':
                        $values[] = $pengajuan->pekerjaan == 'bekerja' ? 1 : ($pengajuan->pekerjaan == 'tidak bekerja' ? 2 : '-');
                        break;
                    case 'penghasilan':
                        if ($pengajuan->penghasilan <= 500000) {
                            $values[] = 1;
                        } elseif ($pengajuan->penghasilan > 500000 && $pengajuan->penghasilan <= 1000000) {
                            $values[] = 2;
                        } elseif ($pengajuan->penghasilan > 1000000 && $pengajuan->penghasilan <= 1500000) {
                            $values[] = 3;
                        } elseif ($pengajuan->penghasilan > 1500000 && $pengajuan->penghasilan <= 2000000) {
                            $values[] = 4;
                        } else {
                            $values[] = 5;
                        }
                        break;
                    case 'jumlah_tanggungan':
                        $values[] = $pengajuan->jumlah_tanggungan > 4 ? 6 : $pengajuan->jumlah_tanggungan + 1;
                        break;
                    case 'tempat_tinggal':
                        switch ($pengajuan->tempat_tinggal) {
                            case 'Menumpang':
                                $values[] = 1;
                                break;
                            case 'Kontrakan':
                                $values[] = 2;
                                break;
                            case 'Rumah Pribadi':
                                $values[] = 3;
                                break;
                            default:
                                $values[] = '-';
                        }
                        break;
                    case 'pendidikan':
                        $pendidikanMapping = [
                            'tidak sekolah' => 1,
                            'SD' => 2,
                            'SMP' => 3,
                            'SMA' => 4,
                            'kuliah' => 5
                        ];
                        $values[] = $pendidikanMapping[$pengajuan->pendidikan] ?? '-';
                        break;
                    // Tambahkan kasus lain jika diperlukan
                    default:
                        $values[] = '-';
                }
            }
            $kriteriaValues[] = $values;
        }

        // Mengumpulkan nilai maksimum dan minimum untuk setiap kriteria
    $maxValues = [];
    $minValues = [];
    foreach ($kriterias as $kriteria) {
        $values = $pengajuans->pluck($kriteria->nama_kriteria)->toArray();
        $maxValues[] = count($values) > 0 ? max($values) : 0;
        $minValues[] = count($values) > 0 ? min($values) : 0;
    }

        // Mengarahkan ke view RW.perangkingan.index dan kirimkan data pengajuans
        return view('spk.menu', compact('pengajuans', 'kriterias', 'maxValues', 'minValues', 'kriteriaValues'));
    }
    public function ambilKriteria()
    {
        // Ambil data kriteria
        return Kriteria::orderBy('id_kriteria')->get();
    }

    public function ambilAlternatif()
    {
        // Ambil data Alternatif
        return PengajuanModel::with('kriteria')->orderBy('id_pengajuan')->get();
    }

    public function ambilPenilaian()
    {
        // Assuming this method should return both alternatives and criteria
        $alternatif = $this->ambilAlternatif();
        $kriterias = $this->ambilKriteria();

        return compact('alternatif', 'kriterias');
    }

    public function ambilPerhitungan()
    {
        // Assuming hitungPSI() method is properly defined somewhere
        return $this->hitungPSI();
    }

    public function ambilSubKriteria($kriteriaId)
    {
        // Corrected to accept an argument and find sub-criteria
        return Kriteria::find($kriteriaId);
    }

    public function ambilSemuaSubKriteria()
    {
        // If you want to get all sub-criteria for all kriteria
        return Kriteria::with('subKriteria')->get();
    }

    public function calculatePSI()
    {
        // Ambil data kriteria
        $kriteria = DB::table('kriteria')->get();

        // Ambil data subkriteria
        $subkriteria = DB::table('sub_kriteria')->get();

        // Step 1: Membuat Matriks Keputusan
        $matrixKeputusan = DB::table('penilaian')
            ->join('pengajuan', 'penilaian.id_pengajuan', '=', 'pengajuan.id_pengajuan')
            ->join('sub_kriteria', 'penilaian.id_subkriteria', '=', 'sub_kriteria.id_subkriteria')
            ->select('penilaian.id_pengajuan', 'kriteria.nama_kriteria', 'sub_kriteria.nilai')
            ->get();

        // Menginisialisasi array kosong untuk menyimpan matriks keputusan
        $matriksKeputusan = [];

        // Loop untuk mengisi matriks keputusan dengan nilai dari database
        foreach ($matrixKeputusan as $item) {
            $matriksKeputusan[$item->id_pengajuan][$item->nama_kriteria] = $item->nilai;
        }

        // Kirim data ke view
        return view('spk.calculateSpk', [
            'kriteria' => $kriteria,
            'subkriteria' => $subkriteria,
            'matriksKeputusan' => $matriksKeputusan,
        ]);
    }

    // Delete Kriteria
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->back()->with('success', 'Kriteria deleted successfully');
    }

    // Display all Sub Kriteria for a given Kriteria
    public function subKriteria(Kriteria $kriteria)
    {
        $subkriteria = SubKriteria::where('id_kriteria', $kriteria->id)->get();
        return view('kriteria.subkriteria', compact('kriteria', 'subkriteria'));
    }

    // Show form to create new Sub Kriteria for a given Kriteria
    public function createSubKriteria(Kriteria $kriteria)
    {
        return view('kriteria.createSubKriteria', compact('kriteria'));
    }

    // Store new Sub Kriteria for a given Kriteria
    public function storeSubKriteria(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required',
        ]);

        SubKriteria::create([
            'id_kriteria' => $kriteria->id,
            'name' => $request->name,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('kriteria.subKriteria', $kriteria->id)
            ->with('success', 'Sub Kriteria created successfully.');
    }

    // Show form to edit Sub Kriteria for a given Kriteria
    public function editSubKriteria(SubKriteria $subKriteria)
    {
        return view('kriteria.editSubKriteria', compact('subKriteria'));
    }

    // Update Sub Kriteria for a given Kriteria
    public function updateSubKriteria(Request $request, SubKriteria $subKriteria)
    {
        $request->validate([
            'name' => 'required',
            'bobot' => 'required',
        ]);

        $subKriteria->update($request->all());

        return redirect()->route('kriteria.subKriteria', $subKriteria->id_kriteria)
            ->with('success', 'Sub Kriteria updated successfully');
    }
}
