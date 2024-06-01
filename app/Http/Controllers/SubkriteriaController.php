<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function index($kriteria)
    {
        // Mengambil data kriteria
        $kriteria = Kriteria::findOrFail($kriteria);

        // Mengambil semua subkriteria untuk kriteria tertentu
        $subkriteria = $kriteria->subkriteria;

        return view('subkriteria.index', compact('kriteria', 'subkriteria'));
    }

    public function create($kriteria)
    {
        // Mengambil data kriteria
        $kriteria = Kriteria::findOrFail($kriteria);

        return view('subkriteria.create', compact('kriteria'));
    }

    public function store(Request $request, $kriteria)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);

        // Membuat subkriteria baru untuk kriteria tertentu
        $kriteria = Kriteria::findOrFail($kriteria);
        $kriteria->subkriteria()->create([
            'name' => $request->name,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('subkriteria.index', $kriteria)->with('success', 'Subkriteria berhasil disimpan.');
    }

    public function destroy($kriteriaId, $subkriteriaId)
    {
        // Menghapus subkriteria
        SubKriteria::findOrFail($subkriteriaId)->delete();

        return redirect()->route('subkriteria.index', $kriteriaId)->with('success', 'Subkriteria berhasil dihapus.');
    }
}
