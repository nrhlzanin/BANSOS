<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansosModel;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerimas = PenerimaBansosModel::all();
        return view('penerimas.index', compact('penerimas'));
    }

    public function create()
    {
        return view('penerimas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jenisbansos' => 'required|integer',
            'id_petugas' => 'required|integer',
            'id_admin' => 'required|integer',
            'id_pengajuan' => 'required|integer',
            'tanggal_penerimaan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        PenerimaBansosModel::create($request->all());

        return redirect()->route('penerimas.index')->with('success', 'Data penerima berhasil ditambahkan.');
    }
    
    public function show($id)
    {
        $penerima = PenerimaBansosModel::findOrFail($id);
        return view('penerimas.detail', compact('penerima'));
    }

    public function edit($id)
    {
        $penerima = PenerimaBansosModel::findOrFail($id);
        return view('penerimas.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jenisbansos' => 'required|integer',
            'id_petugas' => 'required|integer',
            'id_admin' => 'required|integer',
            'id_pengajuan' => 'required|integer',
            'tanggal_penerimaan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $penerima = PenerimaBansosModel::findOrFail($id);
        $penerima->update($request->all());

        return redirect()->route('penerimas.index')->with('success', 'Data penerima berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerima = PenerimaBansosModel::findOrFail($id);
        $penerima->delete();
        return redirect()->route('penerimas.index')->with('success', 'Data penerima berhasil dihapus.');
    }
}
