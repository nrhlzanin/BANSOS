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
        //
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
            'pekerjaan' => 'required|string|max:255',
            'penghasilan' => 'required|numeric',
            'pendidikan' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer',
            'tempat_tinggal' => 'required|string|max:255',
            'kriteria' => 'nullable|string',
        ]);

        PengajuanModel::create($request->all());

        return redirect()->route('pengajuan.create')->with('success', 'Pengajuan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
