<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\WargaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function informasiAkun()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Debugging
        if ($user->warga) {
            dd($user->warga);
        } else {
            dd('Tidak ada data warga yang cocok');
        }

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

    public function akunWarga()
    {
        $warga = Auth::user()->warga;

        return view('warga.profileSaya.index', compact('warga'));
    }
    public function akunPetugas()
    {
        return view('RT.informasi-akunRT');
    }
    public function index()
    {
        $akun = UserModel::where('level', 'warga')->get();
        return view('RT.dataAkunWarga.index', compact('akun'));
    }

    public function create()
    {
        return view('RT.dataAkunWarga.addAkun');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:user',
            'nama_kepalaKeluarga' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'no_rt' => 'required|string|max:3',
            'no_kk' => 'required|string|max:16',
            'no_nik' => 'required|string|max:16',
        ]);
    
        // Simpan data baru ke tabel user
        $user = UserModel::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'warga',
            'email' => $request->email,
        ]);
    
        // Simpan data baru ke tabel warga
        WargaModel::create([
            'id_user' => $user->id_user, // Ensure id_user is set here
            'nama_kepalaKeluarga' => $request->nama_kepalaKeluarga,
            'no_telp' => $request->no_telp,
            'no_rt' => $request->no_rt,
            'no_kk' => $request->no_kk,
            'no_nik' => $request->no_nik,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('petugas.data-akun-warga')->with('success', 'Akun berhasil dibuat.');
    }
    

    public function show($id)
    {
        $akun = UserModel::findOrFail($id);
        return view('RT.dataAkunWarga.showAkun', compact('akun'));
    }
    public function edit($id)
    {
        $akun = UserModel::findOrFail($id);
        return view('RT.dataAkunWarga.editAkun', compact('akun'));
    }
    public function update(Request $request, $id)
    {
        $akun = UserModel::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255|unique:user,username,' . $id . ',id_user',
            'email' => 'required|string|email|max:255|unique:user,email,' . $id . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $akun->username = $request->username;
        $akun->email = $request->email;
        if ($request->filled('password')) {
            $akun->password = Hash::make($request->password);
        }
        $akun->save();

        return redirect()->route('petugas.data-akun-warga')->with('success', 'Akun berhasil diperbaharui.');
    }
    public function destroy($id)
    {
        $akun = UserModel::findOrFail($id);
        $akun->delete();

        return redirect()->route('petugas.data-akun-warga')->with('success', 'Akun berhasil dihapus.');
    }
}
