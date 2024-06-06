<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BansosController extends Controller
{
    public function index()
    {
        //$count_pengajuan = DB::table('pengajuan')->count();
        //$count_bansos = DB::table('bansos')->count();

        $bansos = BansosModel::all();
        return view('Rw.informasiBansos.index', compact('bansos'));
    }
}
