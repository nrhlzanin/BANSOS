<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Penerima;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('RW.dashboardrw');
    }

    public function dataWarga()
    {
        $penerimas = \App\Models\Penerima::all();
        return view('RW.dataWarga.data-warga', compact('penerimas'));

    }

    public function create()
    {
        return view('RW.dataWarga.create');
    }

    public function show($id)
    {
        $penerima = Penerima::findOrFail($id);
        return view('RW.dataWarga.detail', compact('penerima'));
    }


    public function edit()
    {

    }


    public function validasi() 
    {
        return view('RW.validasi');   
    }
    public function validasiData()
    {
        return view('RW.validasiDataWarga.validation');
    }

    public function informasiAkun()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Pastikan $user dikirim ke view
        return view('RW.informasi-akun', compact('user'));
    }

    public function updateAccountInfo(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:20|unique:user,username,' . Auth::id() . ',id_user',
            'email' => 'required|string|email|max:50|unique:user,email,' . Auth::id() . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Update data pengguna
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Informasi akun berhasil diperbarui.');
    }

    public function perankingan()
    {
        return view('spk.layouts.menu');
    }

}
