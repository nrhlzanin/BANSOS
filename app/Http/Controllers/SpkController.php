<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\AlternatifModel;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public $kriteria_id;

	public $name, $min, $max, $bobot;

    public function perankingan()
{
    // Ambil data kriteria, alternatif, dan sub-kriteria
    $kriteria = $this->ambilKriteria();
    $alternatif = $this->ambilAlternatif();
    $sub_kriteria = $this->ambilSemuaSubKriteria(); // Atau $this->ambilSubKriteria($kriteria_id) jika Anda memiliki kriteria ID yang spesifik

    // Pastikan data yang diterima adalah array atau koleksi
    if (!is_array($kriteria) && !$kriteria instanceof \Illuminate\Support\Collection) {
        throw new \Exception('Data kriteria harus berupa array atau koleksi.');
    }

    if (!is_array($alternatif) && !$alternatif instanceof \Illuminate\Support\Collection) {
        throw new \Exception('Data alternatif harus berupa array atau koleksi.');
    }

    if (!is_array($sub_kriteria) && !$sub_kriteria instanceof \Illuminate\Support\Collection) {
        throw new \Exception('Data sub kriteria harus berupa array atau koleksi.');
    }

    return view('spk.menu', compact('kriteria', 'alternatif', 'sub_kriteria'));
}


    public function ambilKriteria()
    {
        // Ambil data kriteria
        return Kriteria::orderBy('kode')->get();
    }

    public function ambilAlternatif()
    {
        // Ambil data Alternatif
        return AlternatifModel::orderBy('id_pengajuan')->get();
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

    private function hitungPSI()
    {
        $alternatif = AlternatifModel::orderBy('id_pengajuan')->get();
        $kriteria = Kriteria::orderBy('kode')->pluck('type')->toArray();
    
    
        // penentuan matriks keputusan
        $Xij = [];
        foreach ($alternatif as $ka => $alt) {
            foreach ($alt->kriteria as $kk => $krit) {
                $Xij[$ka][$kk] = $krit->pivot->nilai;
            }
        }

        // Pengecekan apakah $Xij tidak kosong untuk mencegah error undefined array key
        if (empty($Xij) || empty($Xij[0])) {
            return $alternatif; // Mengembalikan data alternatif atau tangani kasus ini sesuai kebutuhan
        }
    
        // normalisasi matriks keputusan
        $rows = count($Xij);
        $cols = count($Xij[0]);
        $Nij = [];
        for ($j = 0; $j < $cols; $j++) {
            $xj = [];
            for ($i = 0; $i < $rows; $i++) {
                $xj[] = $Xij[$i][$j];
            }
    
            $divisor = max($xj);
            $cost = false;
            if ($kriteria[$j]['type'] == false) {
                $cost = true;
                $divisor = min($xj);
            }
    
            foreach ($xj as $kj => $x) {
                $Nij[$kj][$j] = $cost ? ($divisor / $x) : ($x / $divisor);
            }
        }
    
        // menjumlahkan elemen tiap kolom matriks
        $EN = [];
        for ($i = 0; $i < $cols; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $rows; $j++) {
                $jumlah += $Nij[$j][$i];
            }
            $EN[] = $jumlah;
        }
    
        // hitung nilai mean
        $N = [];
        foreach ($EN as $e) {
            $N[] = $e / $rows;
        }
    
        // hitung variasi preferensi
        $Tj = [];
        for ($i = 0; $i < $cols; $i++) {
            for ($j = 0; $j < $rows; $j++) {
                $Tj[$j][$i] = pow($Nij[$j][$i] - $N[$i], 2);
            }
        }
    
        // hitung total tiap kriteria
        $TTj = [];
        for ($i = 0; $i < $cols; $i++) {
            $jumlah = 0;
            for ($j = 0; $j < $rows; $j++) {
                $jumlah += $Tj[$j][$i];
            }
            $TTj[] = $jumlah;
        }
    
        // menentukan penyimpangan nilai preferensi
        $Omega = [];
        foreach ($TTj as  $ttj) {
            $Omega[] = 1 - $ttj;
        }
    
        // total penyimpangan nilai preferensi
        $EOmega = array_sum($Omega);
    
        // menghitung kriteria bobot
        $Wj = [];
        foreach ($Omega as $o) {
            $Wj[] = $o / $EOmega;
        }
    
        // menghitung PSI
        $ThetaI = [];
        for ($i = 0; $i < $cols; $i++) {
            for ($j = 0; $j < $rows; $j++) {
                $ThetaI[$j][$i] = $Nij[$j][$i] * $Wj[$i];
            }
        }
    
        // penjumlahan tiap baris proses sebelumnya
        $TThetaI = [];
        foreach ($ThetaI as $theta) {
            $TThetaI[] = array_sum($theta);
        }
    
        foreach ($alternatif as $key => $alternatif) {
            $alternatif->nilai = round($TThetaI[$key], 4);
        }
    
        return $alternatif;
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
