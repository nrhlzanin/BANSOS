<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansosModel;
use App\Models\PengajuanModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataPengajuanRT(Request $request)
    {
        $user = Auth::user();
        $no_rt = $user->rt->no_rt;
        $pengajuans = PengajuanModel::whereHas('warga', function ($query) use ($no_rt) {
            $query->where('no_rt', $no_rt);
        })->get();

        return view('RT.dataPengajuan.index', compact('no_rt','pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Auth::user()->warga;
        return view('warga.pengajuan.create', compact('warga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto_kk' => 'required|image|mimetypes:image/*|max:2048',
            'foto_ktp' => 'required|mimetypes:image/*|max:2048',
            'pekerjaan' => 'required|max:50|in:Bekerja,Tidak Bekerja',
            'penghasilan' => 'required|string|in:<=500.000,>500.000 sampai <=1.000.000,>1.000.000 sampai <=1.500.000,>1.500.000 sampai <=2.000.000,>2.000.000',
            'foto_slipgaji' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'pendidikan' => 'required|string|in:Tidak Sekolah,SD,SMP,SMA,Kuliah',
            'jumlah_tanggungan' => 'required|integer',
            'tempat_tinggal' => 'required|string|in:Menumpang,Kontrakan,Rumah Pribadi',
            'transportasi' => 'required|string|in:Jalan Kaki dan/ Sepeda,Transportasi Umum,1 Kendaraan Bermotor,2 Kendaraan Bermotor,>2 Kendaraan Bermotor',
            'luas_bangunan' => 'required|string|in:0-50 m2,>50-100m2,>100-150m2,>150-200m2,>200m2',
            'jenis_atap' => 'required|string|in:Jerami,Bambu,Seng,Genteng Tanah Liat,Asbes,Genteng Metal',
            'jenis_dinding' => 'required|string|in:Tembok,Triplek,Anyaman Bambu,Papan Kayu,Batu Bata,Batako',
            'kelistrikan' => 'required|string|in:Menumpang,Pribadi 450watt,Pribadi 900watt,Pribadi 1200watt,Pribadi >1200watt',
            'sumber_air_bersih' => 'required|string|in:Sumur Swadaya,Sumur Tetangga,Sumur Pribadi,PDAM Terbatas,PDAM Bebas',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $foto_kk_path = null;
        $foto_ktp_path = null;
        $foto_slipgaji_path = null;

        if ($request->foto_kk instanceof UploadedFile) {
            $imageName = $request->foto_kk->getClientOriginalName();
            
            $foto_kk_path = $request->foto_kk->storeAs(
                path: '/images/foto_kk',
                name: $imageName
            );
        }
        if ($request->foto_ktp instanceof UploadedFile) {
            $imageName = $request->foto_ktp->getClientOriginalName();
            
            $foto_ktp_path = $request->foto_ktp->storeAs(
                path: '/images/foto_ktp',
                name: $imageName
            );
        }
        if ($request->foto_slipgaji instanceof UploadedFile) {
            $imageName = $request->foto_slipgaji->getClientOriginalName();
            
            $foto_slipgaji_path = $request->foto_slipgaji->storeAs(
                path: '/images/foto_slipgaji',
                name: $imageName
            );
        }

        PengajuanModel::create([
            ...$request->all(),
            'id_warga' => auth()->user()->warga->id_warga,
            'foto_kk' => $foto_kk_path,
            'foto_ktp' => $foto_ktp_path,
            'foto_slipgaji' => $foto_slipgaji_path,
        ]);

        return redirect()->route('warga.pengajuan.create')->with('success', 'Pengajuan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = PengajuanModel::findOrFail($id);
        return view('RT.dataPengajuan.show', compact('pengajuan'));
    }

    public function validatePengajuan($id)
{
    PengajuanModel::where('id_pengajuan', $id)
        ->update(['status_data' => 'tervalidasi']);
    
    return redirect()->back()->with('successUpdate', 'Pengajuan berhasil divalidasi.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = PengajuanModel::findOrFail($id);
        return view('pengajuan.edit', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_kk' => 'required|string|max:20',
            'no_nik' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'no_rt' => 'required|integer',
            'pekerjaan' => 'required|string|max:255',
            'penghasilan' => 'required|numeric',
            'pendidikan' => 'required|string|max:255',
            'jumlah_tanggungan' => 'required|integer',
            'tempat_tinggal' => 'required|string|max:255',
            'transportasi' => 'nullable|string|max:255',
            'luas_bangunan' => 'nullable|numeric',
            'jenis_atap' => 'nullable|string|max:255',
            'jenis_dinding' => 'nullable|string|max:255',
            'kelistrikan' => 'nullable|string|max:255',
            'sumber_air_bersih' => 'nullable|string|max:255',
            'aset' => 'nullable|array',
        ]);

        $pengajuan = PengajuanModel::findOrFail($id);
        $pengajuan->update($request->all());

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        $pengajuans = PengajuanModel::findOrFail($id);
        $pengajuans->delete();

        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus.');
    }

    public function status()
    {
        $user = Auth::user()->warga;

        // Mengambil data pengajuan berdasarkan id_warga yang sedang login
        $pengajuan = PengajuanModel::where('id_warga', $user->id_warga)->get();
        // dd($pengajuan);
        return view('warga.statusPengajuan.index', compact('pengajuan', 'user'));
    }
    
    
    
}
