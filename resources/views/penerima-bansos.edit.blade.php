@extends('layouts.app')

@section('content')
<h1>Edit Penerima Bansos</h1>

<form action="{{ route('penerima-bansos.update', $penerimaBansos->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $penerimaBansos->nama }}" required>
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" value="{{ $penerimaBansos->nik }}" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Lengkap</label>
        <textarea name="alamat" id="alamat" class="form-control" required>{{ $penerimaBansos->alamat }}</textarea>
    </div>
    <div class="form-group">
        <label for="no_hp">Nomor Handphone</label>
        <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ $penerimaBansos->no_hp }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
