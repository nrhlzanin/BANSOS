<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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

    public function profilWarga()
    {
        return view("warga.profil.profil");
    }
}
