<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Penerima;

class AdminController extends Controller
{
    public function index()
    {
        return view('RW.dashboardrw');
    }

    public function dataWarga()
    {
        $penerimas = Penerima::all();
        return view('RW.dataWarga.data-warga', compact('penerimas'));

    }

    public function create()
    {
        return view('RW.dataWarga.create');
    }

    public function show($id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('RW.dataWarga.detail', compact('penerima'));
    }


    public function edit()
    {

    }

    public function informasiAkun()
    {
        return view('RW.informasi-akun');
    }

    public function informasiBansos()
    {
        return view('RW.informasiBansos.index');
    }

    public function validasi() 
    {
        return view('RW.validasi');   
    }
    public function validasiData()
    {
        return view('RW.validasiDataWarga.validation');
    }
}
