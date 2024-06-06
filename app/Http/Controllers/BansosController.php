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
        return view('Rw.informasiBansos.index', compact('bansos'));
    }
}
