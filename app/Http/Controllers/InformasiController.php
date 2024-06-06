<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\InformasiModel;
use App\Models\JenisBantuan;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi_akun = InformasiModel::all();
        return view('RW.informasi.informasi-akun', compact('informasi_akun'));
    }

    public function show(InformasiModel $informasi)
    {
        return view("main.detailInformasi", [
            "informasi" => $informasi,
            "jenisBantuan" => JenisBantuan::where("id", $informasi->jenisBantuan_id)->get()
        ]);
    }
}
