<?php

namespace App\Http\Controllers;

use App\Models\PengajuanModel;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuanModel = PengajuanModel::all();
        return view('pengajuan.index', compact('pengajuanModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|string|max:20',
            'no_nik' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'no_rt' => 'required|integer',
            'pekerjaan' => 'required|string|max:255',
            'penghasilan' => 'required|numeric',
            'pendidikan' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer',
            'tempat_tinggal' => 'required|string|max:255',
            'transportasi' => 'nullable|string|max:255',
            'luas_bangunan' => 'nullable|numeric',
            'jenis_atap' => 'nullable|string|max:255',
            'jenis_dinding' => 'nullable|string|max:255',
            'kelistrikan' => 'nullable|string|max:255',
            'sumber_air_bersih' => 'nullable|string|max:255',
            'aset' => 'nullable|array',
        ]);

        PengajuanModel::create($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = PengajuanModel::findOrFail($id);
        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = PengajuanModel::findOrFail($id);
        return view('pengajuan.edit', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_kk' => 'required|string|max:20',
            'no_nik' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'no_rt' => 'required|integer',
            'pekerjaan' => 'required|string|max:255',
            'penghasilan' => 'required|numeric',
            'pendidikan' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer',
            'tempat_tinggal' => 'required|string|max:255',
            'transportasi' => 'nullable|string|max:255',
            'luas_bangunan' => 'nullable|numeric',
            'jenis_atap' => 'nullable|string|max:255',
            'jenis_dinding' => 'nullable|string|max:255',
            'kelistrikan' => 'nullable|string|max:255',
            'sumber_air_bersih' => 'nullable|string|max:255',
            'aset' => 'nullable|array',
        ]);

        $pengajuan = PengajuanModel::findOrFail($id);
        $pengajuan->update($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = PengajuanModel::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dihapus.');
    }
}
