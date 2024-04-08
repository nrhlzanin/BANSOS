<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaBansosModel;

class PenerimaBansosController extends Controller
{
    /**
     * Menampilkan daftar penerima bansos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimaBansos = PenerimaBansosModel::all();
        return view('penerima-bansos.index', compact('penerimaBansos'));
    }

    /**
     * Menampilkan formulir pembuatan penerima bansos baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerima-bansos.create');
    }

    /**
     * Menyimpan penerima bansos baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penerimaBansos = PenerimaBansosModel::create($request->all());
        return redirect()->route('penerima-bansos.index');
    }

    /**
     * Menampilkan detail penerima bansos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerimaBansos = PenerimaBansosModel::find($id);
        return view('penerima-bansos.show', compact('penerimaBansos'));
    }

    /**
     * Menampilkan formulir edit penerima bansos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerimaBansos = PenerimaBansosModel::find($id);
        return view('penerima-bansos.edit', compact('penerimaBansos'));
    }

    /**
     * Memperbarui data penerima bansos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penerimaBansos = PenerimaBansosModel::find($id);
        $penerimaBansos->update($request->all());
        return redirect()->route('penerima-bansos.index');
    }

    /**
     * Menghapus penerima bansos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerimaBansos = PenerimaBansosModel::find($id);
        $penerimaBansos->delete();
        return redirect()->route('penerima-bansos.index');
    }
}
