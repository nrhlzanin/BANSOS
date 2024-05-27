<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
    use Illuminate\Http\Request;
    use App\Models\Penerima;
    
=======
use Illuminate\Http\Request;
>>>>>>> 95c1c9d4fb5bc63ab51f4878e3d6760fddff3dab

class AdminController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        public function index()
        {
            return view('RW/admin');
        }

        public function dataWarga()
        {
            $penerimas = \App\Models\Penerima::all();
            return view('RW.dataWarga.data-warga', compact('penerimas'));
        }

        public function create()
        {
            return view('RW.dataWarga.create', compact('penerimas'));
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
=======
        return view('RW.dashboardrw');
>>>>>>> 95c1c9d4fb5bc63ab51f4878e3d6760fddff3dab
    }

    public function dataWarga()
    {
        return view('RW.dataWarga.data-warga');
    }

    public function create()
    {
        return view('RW.dataWarga.create');
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
    public function validasiData()
    {
        return view('RW.validasiDataWarga.validation');
    }
}
