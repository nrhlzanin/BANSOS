@extends('layouts.landing')

@section('title', 'Form Pengajuan Bantuan Sosial')

@section('content')
<main class="container" style="margin: 100px auto 100px;">
    <h1>Form Pengajuan Bantuan Sosial</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pengajuan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_kk">No Kartu Keluarga:</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ old('no_kk') }}">
            @error('no_kk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="no_nik">No NIK Kepala Keluarga:</label>
            <input type="text" class="form-control" id="no_nik" name="no_nik" value="{{ old('no_nik') }}">
            @error('no_nik')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
            @error('pekerjaan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="penghasilan">Penghasilan:</label>
            <input type="text" class="form-control" id="penghasilan" name="penghasilan" value="{{ old('penghasilan') }}">
            @error('penghasilan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pendidikan">Pendidikan:</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}">
            @error('pendidikan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah_tanggungan">Jumlah Tanggungan:</label>
            <input type="number" class="form-control" id="jumlah_tanggungan" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') }}">
            @error('jumlah_tanggungan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tempat_tinggal">Tempat Tinggal:</label>
            <input type="text" class="form-control" id="tempat_tinggal" name="tempat_tinggal" value="{{ old('tempat_tinggal') }}">
            @error('tempat_tinggal')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kriteria">Kriteria Pendukung:</label>
            <textarea class="form-control" id="kriteria" name="kriteria">{{ old('kriteria') }}</textarea>
            @error('kriteria')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>
</main>
@endsection
