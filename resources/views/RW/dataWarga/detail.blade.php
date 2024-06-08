@extends('RW.layouts.main')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b><span style="font-family: 'Arial Black', sans-serif;">Detail Bansos</span></b></h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label" style="margin: 5px">Nama:</label>
                        <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->warga->nama_kepalaKeluarga }}</p>
                    </div>
        
                    <!-- No. KTP -->
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label" style="margin: 5px">No. KTP:</label>
                        <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->warga->no_nik }}</p>
                    </div>
        
                    <!-- No Telepon -->
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label" style="margin: 5px; margin-top: 9px;">No Telepon:</label>
                        <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->warga->no_telp }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- No. KK -->
                    <div class="mb-3">
                        <label for="no_kk" class="form-label" style="margin: 5px">No. KK:</label>
                        <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->warga->no_kk }}</p>
                    </div>
        
                    <!--Jenis Bansos-->
                    <div class="mb-3">
                        <label for="no_kk" class="form-label" style="margin: 5px">Jenis Bansos:</label>
                        <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->bansos->jenis_bansos }}</p>
                    </div>
        
                    <!-- RT -->
                    <div class="mb-3">
                        <label for="rt" class="form-label" style="margin: 5px">RT:</label>
                        <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->warga->no_rt }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Status Pekerjaan -->
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label" style="margin: 5px">Status Pekerjaan:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->pekerjaan == 1 ? 'Bekerja' : 'Tidak Bekerja' }}</p>
                        </div>
        
                        <!-- Jumlah Tanggungan -->
                        <div class="mb-3">
                            <label for="tanggungan" class="form-label" style="margin: 5px">Jumlah Tanggungan:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->tanggungan }}</p>
                        </div>
        
                        <!-- Status Tempat Tinggal -->
                        <div class="mb-3">
                            <label for="tempat_tinggal" class="form-label" style="margin: 5px">Status Tempat Tinggal:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->tempat_tinggal }}</p>
                        </div>
        
                        <!-- Sumber Air Bersih -->
                        <div class="mb-3">
                            <label for="air" class="form-label" style="margin: 5px">Sumber Air Bersih:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->sumber_air_bersih }}</p>
                        </div>
        
                        <!-- Kelistrikan -->
                        <div class="mb-3">
                            <label for="listrik" class="form-label" style="margin: 5px">Kelistrikan:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->kelistrikan }}</p>
                        </div>
        
                        <!-- Transportasi -->
                        <div class="mb-3">
                            <label for="transportasi" class="form-label" style="margin: 5px">Transportasi:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->transportasi }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Penghasilan Per Bulan -->
                        <div class="mb-3">
                            <label for="penghasilan" class="form-label" style="margin: 5px">Penghasilan Per Bulan:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->penghasilan }}</p>
                        </div>
        
                        <!-- Pendidikan Terakhir -->
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label" style="margin: 5px">Pendidikan Terakhir:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->pendidikan }}</p>
                        </div>
        
                        <!-- Jenis Dinding -->
                        <div class="mb-3">
                            <label for="dinding" class="form-label" style="margin: 5px">Jenis Dinding:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->jenis_dinding }}</p>
                        </div>
        
                        <!-- Jenis Atap -->
                        <div class="mb-3">
                            <label for="atap" class="form-label" style="margin: 5px">Jenis Atap:</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->jenis_atap }}</p>
                        </div>
        
                        <!-- Luas Bangunan -->
                        <div class="mb-3">
                            <label for="luas" class="form-label" style="margin: 5px">Luas Bangunan (m²):</label>
                            <p class="form-control form-control-lg" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">{{ $penerima_bansos->alternatif->pengajuan->luas_bangunan }}</p>
                        </div>
        
                        <!-- Aset
                        <div class="mb-3">
                            <label for="aset" class="form-label" style="margin: 5px">Aset:</label>
                            <ul class="list-group" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                            </ul>
                        </div>-->
        
                        <!-- Gambar Slip Gaji -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Slip Gaji:</label>
                            <img src="{{ asset('storage/'.$penerima_bansos->alternatif->pengajuan->foto_slipgaji) }}" alt="Slip Gaji" style="max-width: 200px; margin-top: 10px;">
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.data-warga') }}" class="btn btn-secondary" style="margin-top: 20px;">Kembali</a>
        </div>
    </div>
</main>
@endsection
