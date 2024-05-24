<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('RW/admin');
    }

    public function dataWarga()
    {
        return view('RW.dataWarga.data-warga');
    }

    public function create()
    {
        return view('RW.dataWarga.informasi.create');
    }

    public function details()
    {
        return view('RW.dataWarga.informasi.detail');
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
}
