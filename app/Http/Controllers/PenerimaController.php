<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerimas = Penerima::all();
        return view('penerimas.index', compact('penerimas'));
    }
}
