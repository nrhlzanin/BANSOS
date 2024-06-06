<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index() {
        $count_pengajuan = DB::table('pengajuan')->count();
        $count_bansos = DB::table('bansos')->count();
        
        return view('landing.index', compact('count_pengajuan', 'count_bansos'));
    }
}
