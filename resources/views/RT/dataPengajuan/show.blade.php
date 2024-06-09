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
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_kepalaKeluarga" class="form-label">Nama Kepala Keluarga:</label>
                                    <input type="text" class="form-control" name="nama_kepalaKeluarga" id="nama_kepalaKeluarga" value="{{ $pengajuan->warga->nama_kepalaKeluarga }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan:</label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ $pengajuan->pekerjaan }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="penghasilan" class="form-label">Penghasilan:</label>
                                    <input type="text" class="form-control" name="penghasilan" id="penghasilan" value="{{ $pengajuan->penghasilan }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="pendidikan" class="form-label">Pendidikan:</label>
                                    <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="{{ $pengajuan->pendidikan }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_tanggungan" class="form-label">Jumlah Tanggungan:</label>
                                    <input type="text" class="form-control" name="jumlah_tanggungan" id="jumlah_tanggungan" value="{{ $pengajuan->jumlah_tanggungan }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_tinggal" class="form-label">Tempat Tinggal:</label>
                                    <input type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" value="{{ $pengajuan->tempat_tinggal }}" readonly>
                                </div>
                                <div class="mb-3">
                                  <label for="status_data" class="form-label">Status Data:</label>
                                  <input type="text" class="form-control" name="status_data" id="status_data" value="{{ $pengajuan->status_data }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label for="transportasi" class="form-label">Transportasi:</label>
                                <input type="text" class="form-control" name="transportasi" id="transportasi" value="{{ $pengajuan->transportasi }}" readonly>
                              </div>
                              <div class="mb-3">
                                <label for="luas_bangunan" class="form-label">Luas Bangunan:</label>
                                <input type="text" class="form-control" name="luas_bangunan" id="luas_bangunan" value="{{ $pengajuan->luas_bangunan }}" readonly>
                              </div>
                              <div class="mb-3">
                                <label for="jenis_atap" class="form-label">Jenis Atap:</label>
                                <input type="text" class="form-control" name="jenis_atap" id="jenis_atap" value="{{ $pengajuan->jenis_atap }}" readonly>
                              </div>
                              <div class="mb-3">
                                <label for="jenis_dinding" class="form-label">Jenis Dinding:</label>
                                <input type="text" class="form-control" name="jenis_dinding" id="jenis_dinding" value="{{ $pengajuan->jenis_dinding }}" readonly>
                              </div>
                              <div class="mb-3">
                                <label for="kelistrikan" class="form-label">Kelistrikan:</label>
                                <input type="text" class="form-control" name="kelistrikan" id="kelistrikan" value="{{ $pengajuan->kelistrikan }}" readonly>
                              </div>
                              <div class="mb-3">
                                <label for="sumber_air_bersih" class="form-label">Sumber Air Bersih:</label>
                                <input type="text" class="form-control" name="sumber_air_bersih" id="sumber_air_bersih" value="{{ $pengajuan->sumber_air_bersih }}" readonly>
                              </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Menampilkan Foto dalam 3 kolom -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="foto_kk" class="form-label">Foto Kartu Keluarga:</label>
                                    <div>
                                        <img src="{{ asset($pengajuan->foto_kk) }}" alt="Foto Kartu Keluarga" class="img-fluid" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP:</label>
                                    <div>
                                        <img src="{{ asset($pengajuan->foto_ktp) }}" alt="Foto KTP" class="img-fluid" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="foto_slipgaji" class="form-label">Foto Slip Gaji:</label>
                                    <div>
                                        <img src="{{ asset($pengajuan->foto_slipgaji) }}" alt="Foto Slip Gaji" class="img-fluid" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('petugas.data-pengajuan') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
