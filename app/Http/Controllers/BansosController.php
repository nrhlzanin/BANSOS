<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BansosController extends Controller
{
    public function index()
    {
        $bansos = BansosModel::all();
        return view('RW.informasiBansos.index', compact('bansos'));
    }
    public function create()
    {
        return view('RW.informasiBansos.addBansos');
    }
    public function store(Request $request)
    {
        $request->validate([
            'asal_bansos' => 'required|string|max:50',
            'jenis_bansos' => 'required|string|max:50',
            'periode' => 'required|date',
            'keterangan' => 'required|string',
            'status' => 'required|string'
        ]);

        // Simpan data ke dalam database
        BansosModel::create($request->all());

        return redirect()->route('admin.informasi-bansos')->with('success', 'Product add successfully');
    }
    public function show($id)
    {
        $bansos = BansosModel::findOrFail($id);
        return view('RW.informasiBansos.showBansos', compact('bansos'));
    }
    public function edit($id)
    {
        $bansos = BansosModel::findOrFail($id);

        return view('RW.informasiBansos.editBansos', compact('bansos'));
    }

    public function update(Request $request, $id)
    {
        $bansos = BansosModel::findOrFail($id);
        $bansos->update($request->all());

        return redirect()->route('admin.informasi-bansos')->with('success', 'Bansos berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $bansos = BansosModel::findOrFail($id);
        $bansos->delete();

        return redirect()->route('admin.informasi-bansos')->with('success', 'Bansos berhasil dihapus.');
    }

    public function bansosrt()
    {
        $bansos = BansosModel::all();
        return view('RT.informasiBansos.index', compact('bansos'));
    }

    public function showrt($id)
    {
        $bansos = BansosModel::findOrFail($id);
        return view('RT.informasiBansos.show', compact('bansos'));
    }
    
}
