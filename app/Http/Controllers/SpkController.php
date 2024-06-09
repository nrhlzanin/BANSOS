<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenilaianModel;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\HasilSPK;
use App\Models\PengajuanModel;
use Illuminate\Support\Facades\DB;

class SpkController extends Controller
{
    public $kriteria_id;

	public $name, $min, $max, $bobot;

    public function perankingan()
{
    // Ambil data kriteria, alternatif, dan sub-kriteria
    $kriteria = $this->ambilKriteria();
    $pengajuans = PengajuanModel::where('status_pengajuan', 'diterima')->where('status_data', 'tervalidasi')->get();
    $sub_kriteria = $this->ambilSemuaSubKriteria(); // Atau $this->ambilSubKriteria($kriteria_id) jika Anda memiliki kriteria ID yang spesifik
    $alternatifs = $this->calculatePSI();
    //return view('spk.menu', compact('kriteria', 'alternatifs', 'pengajuans', 'sub_kriteria'));
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
        $kriteria = $this->ambilKriteria();

        return compact('alternatif', 'kriteria');
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
                        ->with('success','Sub Kriteria created successfully.');
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
                        ->with('success','Sub Kriteria updated successfully');
    }

}
