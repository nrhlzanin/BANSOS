<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaBansosModel;
use App\Models\User;
use App\Models\BansosModel;
use App\Models\AlternatifModel;
use App\Models\PengajuanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('RW.dashboardrw');
    }

    public function dataAlternatif() 
    {
        $pengajuans = PengajuanModel::where('status_data', 'tervalidasi')->get();
        $bansos = BansosModel::all();

        return view('RW.dataAlternatif.index', compact('pengajuans', 'bansos'));
    }
    public function showDataAlternatif($id) {
        $pengajuans = PengajuanModel::where([
            'status_data' => 'tervalidasi',
            'id_pengajuan' => $id
        ])->firstOrFail();

        return view('RW.dataAlternatif.show', compact('pengajuans'));
    }

    public function updateAlternativeToHaveBansos(Request$request)
    {
        $validator = Validator::make($request->all(), [
            'id_bansos' => 'required|integer|exists:bansos,id_bansos',
            'id_pengajuan' => 'array|min:1',
            'id_pengajuan.*' => 'required|exists:pengajuan,id_pengajuan'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        foreach ($request->id_pengajuan as $id_pengajuan) {
            PengajuanModel::where('id_pengajuan', $id_pengajuan)->update([
                'status_pengajuan' => 'diterima'
            ]);

            $alternativeModel = AlternatifModel::make([
                'id_pengajuan' => $id_pengajuan
            ]);

            $alternativeModel->save();

            PenerimaBansosModel::create([
                'id_alternatif' => $alternativeModel->id_alternatif,
                'id_bansos' => $request->id_bansos,
                'tanggal_penerimaan' => now(),
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function dataWarga()
    {
        $user = Auth::user();

        // Eager load relasi yang diperlukan dan gunakan join untuk mengurutkan berdasarkan id_pengajuan
        $penerima_bansos = PenerimaBansosModel::with([
            'alternatif.pengajuan.warga', // Relasi dari penerima_bansos -> alternatif -> pengajuan -> warga
            'bansos' // Relasi dari penerima_bansos -> bansos
        ])->join('alternatif', 'penerima_bansos.id_alternatif', '=', 'alternatif.id_alternatif')
          ->orderBy('alternatif.id_pengajuan')
          ->get();

        return view('RW.dataWarga.data-warga', compact('penerima_bansos'));
    }

    public function show($id)
    {
        
        $penerima_bansos = PenerimaBansosModel::with([
            'alternatif.pengajuan.warga', // Relasi dari penerima_bansos -> alternatif -> pengajuan -> warga
            'bansos' // Relasi dari penerima_bansos -> bansos
        ])->where('id_penerimabansos', $id) // Menyaring berdasarkan ID
        ->firstOrFail(); // Mengambil satu hasil atau gagal jika tidak ditemukan
        
        return view('RW.dataWarga.detail', compact('penerima_bansos'));
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
            // 'id_petugas' => 'required|integer',
            // 'id_admin' => 'required|integer',
            'id_pengajuan' => 'required|integer',
            'tanggal_penerimaan' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $penerima = PenerimaBansosModel::findOrFail($id);
        $penerima->update($request->all());

        return redirect()->route('admin.dataWarga')->with('success', 'Data penerima berhasil diperbarui.');
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
