<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaBansosModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('RW.dashboardrw');
    }

    public function dataWarga()
    {
        $penerima_bansos = PenerimaBansosModel::all();
        return view('RW.dataWarga.data-warga', compact('penerima_bansos'));
    }

    public function create()
    {
        return view('RW.dataWarga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jenisbansos' => 'required|integer',
            'id_petugas' => 'required|integer',
            'id_admin' => 'required|integer',
            'id_pengajuan' => 'required|integer',
            'tanggal_penerimaan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        PenerimaBansosModel::create($request->all());

        return redirect()->route('admin.dataWarga')->with('success', 'Data penerima berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penerima = PenerimaBansosModel::findOrFail($id);
        return view('RW.dataWarga.detail', compact('penerima'));
    }

    public function edit($id)
    {
        $penerima = PenerimaBansosModel::findOrFail($id);
        return view('RW.dataWarga.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jenisbansos' => 'required|integer',
            'id_petugas' => 'required|integer',
            'id_admin' => 'required|integer',
            'id_pengajuan' => 'required|integer',
            'tanggal_penerimaan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $penerima = PenerimaBansosModel::findOrFail($id);
        $penerima->update($request->all());

        return redirect()->route('admin.dataWarga')->with('success', 'Data penerima berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerima = PenerimaBansosModel::findOrFail($id);
        $penerima->delete();
        return redirect()->route('admin.dataWarga')->with('success', 'Data penerima berhasil dihapus.');
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
        $user = Auth::user();
        return view('RW.informasi-akun', compact('user'));
    }

    public function updateAccountInfo(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:20|unique:user,username,' . Auth::id() . ',id_user',
            'email' => 'required|string|email|max:50|unique:user,email,' . Auth::id() . ',id_user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
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

    public function addBansos()
    {
        return view('RW.addBansos.addBansos');
    }
}
