<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function kriteria()
    {
        $kriterias = Kriteria::orderBy('kode')->get();
        return view('spk.layouts.menu', ['kriterias' => $kriterias]);
    }

    public function create()
    {
        return view('spk.kriteria.modal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'type' => 'required|in:1,0',
        ]);

        Kriteria::create([
            'kode' => $request->kode,
            'name' => $request->nama,
            'type' => $request->type == 'benefit' ? true : false,
        ]);

        return redirect()->route('spk.kriteria.index')->with('success', 'Kriteria berhasil dibuat.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('spk.kriteria.modal.edit', ['kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'bobot' => 'required',
            'type' => 'nullable',
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->update([
            'kode' => $request->kode,
            'name' => $request->nama,
            'bobot' => $request->bobot,
            'type' => $request->type == 'benefit' ? true : false,
        ]);

        return redirect()->route('spk.kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Kriteria::find($id)->delete();
        return redirect()->route('spk.kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
