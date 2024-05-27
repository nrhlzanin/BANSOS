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

    public function create()
    {
        return view('penerimas.create');
    }
    
    public function show($id)
    {
        $penerimas = Penerima::findOrFail($id);
        return view('penerimas.detail', compact('penerimas'));
    }

    public function destroy($id)
    {
        $penerima = Penerima::findOrFail($id);
        $penerima->delete();
        return redirect()->route('penerimas.index')->with('success', 'Data penerima berhasil dihapus.');
    }
}
