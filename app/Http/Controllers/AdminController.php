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
        return view('RW.data-warga');
    }

    public function create()
    {
        return view('RW.informasi.create');
    }

    public function details()
    {
        return view('RW.informasi.detail');
    }

    public function informasiAkun()
    {
        return view('RW.informasi-akun');
    }

    public function validasi() 
    {
        return view('RW.validasi');   
    }
}
