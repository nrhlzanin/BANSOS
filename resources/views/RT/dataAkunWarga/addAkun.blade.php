@extends('layouts.appRT')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tambah Akun</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('petugas') }}">Home</a></li>
                <li class="breadcrumb-item active">Tambah Akun</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('petugas.data-akun-warga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_kepalaKeluarga">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepalaKeluarga" id="nama_kepalaKeluarga" class="form-control" required>
                    @error('nama_kepalaKeluarga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telp</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                    @error('no_telp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_rt">No. RT</label>
                    <input type="text" name="no_rt" id="no_rt" class="form-control" required>
                    @error('no_rt')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_kk">No. KK</label>
                    <input type="text" name="no_kk" id="no_kk" class="form-control" required>
                    @error('no_kk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_nik">No. NIK</label>
                    <input type="text" name="no_nik" id="no_nik" class="form-control" required>
                    @error('no_nik')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
            </form>
        </div>
    </div>
</div>
@endsection
