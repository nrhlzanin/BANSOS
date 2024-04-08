@extends('layouts.app')

@section('content')
<h1>Tambah Penerima Bansos</h1>

<form action="{{ route('penerima-bansos.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Lengkap</label>
        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="no_hp">Nomor Handphone</label>
        <input type="number" name="no_hp" id="no_hp" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
