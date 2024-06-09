@extends('RW.layouts.main')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b><span>Detail Alternatif Pengajuan</span></b></h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label" style="margin: 5px; font-size: 18px;">Nama:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->warga->nama_kepalaKeluarga }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="no_ktp" class="form-label" style="margin: 5px; font-size: 18px;">No. KTP:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->warga->no_nik }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label" style="margin: 5px; font-size: 18px;">No Telepon:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->warga->no_telp }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="no_kk" class="form-label" style="margin: 5px; font-size: 18px;">No. KK:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->warga->no_kk }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="rt" class="form-label" style="margin: 5px; font-size: 18px;">RT:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->warga->no_rt }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label" style="margin: 5px; font-size: 18px;">Status Pekerjaan:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->pekerjaan == 1 ? 'Bekerja' : 'Tidak Bekerja' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggungan" class="form-label" style="margin: 5px; font-size: 18px;">Jumlah Tanggungan:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->jumlah_tanggungan }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="tempat_tinggal" class="form-label" style="margin: 5px; font-size: 18px;">Status Tempat Tinggal:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->tempat_tinggal }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="air" class="form-label" style="margin: 5px; font-size: 18px;">Sumber Air Bersih:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->sumber_air_bersih }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="listrik" class="form-label" style="margin: 5px; font-size: 18px;">Kelistrikan:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->kelistrikan }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="transportasi" class="form-label" style="margin: 5px; font-size: 18px;">Transportasi:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->transportasi }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="penghasilan" class="form-label" style="margin: 5px; font-size: 18px;">Penghasilan Per Bulan:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->penghasilan }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="pendidikan" class="form-label" style="margin: 5px; font-size: 18px;">Pendidikan Terakhir:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->pendidikan }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="dinding" class="form-label" style="margin: 5px; font-size: 18px;">Jenis Dinding:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->jenis_dinding }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="atap" class="form-label" style="margin: 5px; font-size: 18px;">Jenis Atap:</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->jenis_atap }}</span>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="luas" class="form-label" style="margin: 5px; font-size: 18px;">Luas Bangunan (m²):</label>
                                        <span style="font-size: 18px; margin: 5px;">{{ $pengajuans->luas_bangunan }}</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="foto_slipgaji" class="form-label">Foto Slip Gaji:</label>
                                    <div>
                                        <img src="{{ asset($pengajuans->foto_slipgaji) }}" alt="Foto Slip Gaji" class="img-fluid" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.data-alternatif') }}" class="btn btn-secondary" style="margin-top: 20px;">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .mb-3 {
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }
</style>
@endsection

