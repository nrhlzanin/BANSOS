<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\AlternatifModel;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public function perankingan(Kriteria $kriteria)
    {
        // Ambil data
        $data = $this->ambilData($kriteria);
        $kriterias = $data['kriterias'];
        $alternatives = $data['alternatives'];
        $sub_kriterias = $data['sub_kriterias'];

        // Lakukan perhitungan PSI
        $psiScores = $this->hitungPSI($alternatives, $sub_kriterias, $kriteria);

        return view('spk.menu', compact('kriterias', 'kriteria', 'sub_kriterias', 'alternatives', 'psiScores'));
    }

    public function ambilData($kriteria)
    {
        // Ambil data kriteria
        $kriterias = Kriteria::all();

        // Ambil data alternatif
        $alternatives = AlternatifModel::all();

        // Ambil data subkriteria
        $sub_kriterias = SubKriteria::where('kriteria_id', $kriteria->id)->get();

        return compact('kriterias', 'alternatives', 'sub_kriterias');
    }

    public function hitungPSI($alternatifs, $sub_kriterias, $kriteria)
    {
        // Lakukan perhitungan PSI untuk setiap alternatif dan pasangan subkriteria
        $psiScores = [];

        foreach ($alternatifs as $alternative) {
            $psiScore = [];
            foreach ($sub_kriterias as $sub) {
                // Lakukan normalisasi bobot subkriteria (jika diperlukan)
                $min = SubKriteria::where('kriteria_id', $kriteria->id)->min('weight');
                $max = SubKriteria::where('kriteria_id', $kriteria->id)->max('weight');
                $normalizedWeight = ($sub->weight - $min) / ($max - $min);

                // Hitung PSI untuk pasangan subkriteria dan alternatif
                $nilai = $alternative->nilai($sub->id);
                $psiScore[] = $normalizedWeight * $nilai;
            }
            // Hitung total PSI untuk alternatif
            $totalPsi = array_sum($psiScore);
            $psiScores[$alternative->id] = $totalPsi;
        }

        return $psiScores;
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
