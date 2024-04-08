<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BansosModel;

class BansosController extends Controller
{
    /**
     * Menampilkan daftar bansos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bansos = BansosModel::all();
        return view('bansos.index', compact('bansos'));
    }

    /**
     * Menampilkan formulir pembuatan bansos baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bansos.create');
    }

    /**
     * Menyimpan bansos baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bansos = BansosModel::create($request->all());
        return redirect()->route('bansos.index');
    }

    /**
     * Menampilkan detail bansos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bansos = BansosModel::find($id);
        return view('bansos.show', compact('bansos'));
    }

    /**
     * Menampilkan formulir edit bansos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bansos = BansosModel::find($id);
        return view('bansos.edit', compact('bansos'));
    }

    /**
     * Memperbarui data bansos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bansos = BansosModel::find($id);
        $bansos->update($request->all());
        return redirect()->route('bansos.index');
    }

    /**
     * Menghapus bansos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bansos = BansosModel::find($id);
        $bansos->delete();
        return redirect()->route('bansos.index');
    }
}
