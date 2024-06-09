@extends('layouts.appRT')

@section('title', 'Detail Pengajuan')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('petugas') }}">Home</a></li>
              <li class="breadcrumb-item active">Detail Pengajuan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nama Kepala Keluarga: {{ $pengajuan->warga->nama_kepalaKeluarga }}</h5>
                        <p class="card-text">Pekerjaan: {{ $pengajuan->pekerjaan }}</p>
                        <p class="card-text">Penghasilan: {{ $pengajuan->penghasilan }}</p>
                        <p class="card-text">Pendidikan: {{ $pengajuan->pendidikan }}</p>
                        <p class="card-text">Jumlah Tanggungan: {{ $pengajuan->jumlah_tanggungan }}</p>
                        <p class="card-text">Tempat Tinggal: {{ $pengajuan->tempat_tinggal }}</p>
                        <p class="card-text">Transportasi: {{ $pengajuan->transportasi }}</p>
                        <p class="card-text">Luas Bangunan: {{ $pengajuan->luas_bangunan }}</p>
                        <p class="card-text">Jenis Atap: {{ $pengajuan->jenis_atap }}</p>
                        <p class="card-text">Jenis Dinding: {{ $pengajuan->jenis_dinding }}</p>
                        <p class="card-text">Kelistrikan: {{ $pengajuan->kelistrikan }}</p>
                        <p class="card-text">Sumber Air Bersih: {{ $pengajuan->sumber_air_bersih }}</p>
                        <p class="card-text">Status Data: {{ $pengajuan->status_data }}</p>

                        <!-- Menampilkan Foto -->
                        <div class="mt-3">
                            <p class="card-text">Foto Kartu Keluarga:</p>
                            <img src="{{ asset($pengajuan->foto_kk) }}" alt="Foto Kartu Keluarga" class="img-fluid" style="max-width: 200px;">
                        </div>
                        <div class="mt-3">
                            <p class="card-text">Foto KTP:</p>
                            <img src="{{ asset($pengajuan->foto_ktp) }}" alt="Foto KTP" class="img-fluid" style="max-width: 200px;">
                        </div>
                        <div class="mt-3">
                            <p class="card-text">Foto Slip Gaji:</p>
                            <img src="{{ asset($pengajuan->foto_slipgaji) }}" alt="Foto Slip Gaji" class="img-fluid" style="max-width: 200px;">
                        </div>
                    </div>
                </div>

                

                <a href="{{ route('petugas.data-pengajuan') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection