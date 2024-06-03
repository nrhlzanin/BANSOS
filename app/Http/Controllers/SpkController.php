<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public function perankingan(Kriteria $kriteria)
{
    // Ambil data kriteria
    $kriterias = Kriteria::all();

    // Ambil data subkriteria sesuai kriteria yang dipilih
    $subkriteria = SubKriteria::where('kriteria_id', $kriteria->id)->get();

    // Ambil data alternatif
    $alternatives = Alternatif::all();

    // Lakukan perhitungan PSI untuk setiap alternatif dan pasangan subkriteria
    $psiScores = [];

    // Lakukan perhitungan PSI untuk setiap alternatif
    foreach ($alternatives as $alternative) {
        $psiScore = 0;

            // Normalisasi Data ke Bobot Berdasarkan Subkriteria
    foreach ($alternatives as $alternative) {
        $normalizedWeights = [];
        foreach ($subkriteria as $sub) {
            // Hitung nilai relatif dan konversikan ke dalam bobot
            // Simpan bobot dalam array
            $normalizedWeights[] = $sub->weight;
        }

        // Normalisasi Matriks
        // Hitung nilai rata-rata kinerja (N)
        $N = array_sum($normalizedWeights) / count($normalizedWeights);

        // Hitung nilai variasi preferensi (T)
        $T = [];
        foreach ($normalizedWeights as $weight) {
            $T[] = pow($weight - $N, 2);
        }

        // Hitung nilai deviasi preferensi (Omega)
        $Omega = 1 - array_sum($T);

        // Hitung nilai bobot kriteria (W)
        $W = $Omega / array_sum($Omega);

        // Hitung nilai PSI
        $psiScore = 0;
        foreach ($normalizedWeights as $index => $weight) {
            $psiScore += $weight * $W[$index];
        }
        // Simpan nilai PSI ke dalam array
        $psiScores[$alternative->id] = $psiScore;
    }

    return view('spk.menu', compact('kriterias', 'kriteria', 'subkriteria', 'alternatives', 'psiScores'));
    }
}

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->kode = $request->input('kode_kriteria');
        $kriteria->name = $request->input('nama_kriteria');
        $kriteria->type = $request->input('type_kriteria');
        $kriteria->save();

        return redirect()->back()->with('success', 'Kriteria updated successfully');
    }

        // Show form to create new Kriteria
        public function store(Request $request)
        {
            $request->validate([
                'kode' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'type' => 'required|string',
                'bobot' => 'required|numeric',
            ]);
        
            Kriteria::create([
                'kode' => $request->kode,
                'name' => $request->name,
                'type' => $request->type,
                'bobot' => $request->bobot,
            ]);
    
            return redirect()->route('spk.modal.createKriteria.get')->with('success', 'Kriteria berhasil ditambahkan.');
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
        $subkriteria = SubKriteria::where('kriteria_id', $kriteria->id)->get();
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
            'kriteria_id' => $kriteria->id,
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

        return redirect()->route('kriteria.subKriteria', $subKriteria->kriteria_id)
                        ->with('success','Sub Kriteria updated successfully');
    }
}
