<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function index() 
    {
        return view('RT.dashboardrt');
    }
    public function dataWarga() 
    {
        return view('RT.dataWargaRT.index');
    }
    public function informasiAkun() 
    {
        return view('RT.informasi-akunRT');
    }
}
