<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\AlternatifModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;

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
    $alternatifs = $this->hitungPSI();
    return view('spk.menu', compact('kriteria', 'alternatifs', 'pengajuans', 'sub_kriteria'));
}

    public function ambilKriteria()
    {
        // Ambil data kriteria
        return Kriteria::orderBy('kode')->get();
    }

    public function ambilAlternatif()
    {
        // Ambil data Alternatif
        return AlternatifModel::with('kriteria')->orderBy('id_pengajuan')->get();
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
    $kriteria = Kriteria::orderBy('kode')->get();    
    // penentuan matriks keputusan
    $Xij = [];
    foreach ($alternatif as $ka => $alt) {
        foreach ($alt->kriteria as $kk => $krit) {
            $Xij[$ka][$kk] = $krit->pivot->nilai;
        }
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
        if ($kriteria[$j]->type == false) { // Akses tipe kriteria
            $cost = true;
            $divisor = min($xj);
        }

        foreach ($xj as $kj => $x) {
            $Nij[$kj][$j] = $cost ? ($divisor / $x) : ($x / $divisor);
        }
    }

    foreach ($alternatif as $key => $alter) {
        $alter->Nij = $Nij[$key];
    }

    // menjumlahkan elemen tiap kolom matriks
    $EN = [];
    for ($i = 0; $i < $cols; $i++) {
        $jumlah = 0;
        for ($j = 0; $j < $rows; $j++) {
            $jumlah += $Nij[$j][$i];
        }
        $EN[$i] = $jumlah;
    }
    if (!is_null($alternatif) && !is_null($EN)) {
        foreach ($alternatif as $key => $alter) {
            if (array_key_exists($key, $EN)) {
                $alter->ttl = $EN[$key];
            }
        }
    }

    // hitung nilai mean
    $N = [];
    foreach ($EN as $e) {
        $N[] = $e / $rows;
    }
    if (!is_null($alternatif) && !is_null($N)) {
        foreach ($alternatif as $key => $alter) {
            if (array_key_exists($key, $N)) {
                $alter->ave = round($N[$key], 4);
            }
        }
    }

    // hitung variasi preferensi
    $Tj = [];
    for ($i = 0; $i < $cols; $i++) {
        for ($j = 0; $j < $rows; $j++) {
            $Tj[$j][$i] = pow($Nij[$j][$i] - $N[$i], 2);
        }
    }
    foreach ($alternatif as $key => $alter) {
        $alter->Tj = $Tj[$key];
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
    if (!is_null($alternatif) && !is_null($TTj)) {
        foreach ($alternatif as $key => $alter) {
            if (array_key_exists($key, $TTj)) {
                $alter->TTj = round($TTj[$key], 4);
            }
        }
    }

    // menentukan penyimpangan nilai preferensi
    $Omega = [];
    foreach ($TTj as $ttj) {
        $Omega[] = 1 - $ttj;
    }
    if (!is_null($alternatif) && !empty($Omega)) {
        foreach ($alternatif as $key => $alter) {
            if (array_key_exists($key, $Omega)) {
                $alter->ome = round($Omega[$key], 4);
            }
        }
    }

    // total penyimpangan nilai preferensi
    $EOmega = array_sum($Omega);

    // menghitung kriteria bobot
    $Wj = [];
    foreach ($Omega as $o) {
        $Wj[] = $o / $EOmega;
    }
    if (!is_null($alternatif) && !is_null($Wj)) {
        foreach ($alternatif as $key => $alter) {
            if (array_key_exists($key, $Wj)) {
                $alter->bob = round($Wj[$key], 4);
            }
        }
    }

    // menghitung PSI
    $PSI = [];
    for ($i = 0; $i < $cols; $i++) {
        for ($j = 0; $j < $rows; $j++) {
            $PSI[$j][$i] = $Nij[$j][$i] * $Wj[$i];
        }
    }
    foreach ($alternatif as $key => $alter) {
        $alter->psi = $PSI[$key];
    }

    // penjumlahan tiap baris proses sebelumnya
    $TThetaI = [];
    foreach ($PSI as $theta) {
        $TThetaI[] = array_sum($theta);
    }

    foreach ($alternatif as $key => $alter) {
        $alter->nilai = round($TThetaI[$key], 4);
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
