@extends('layouts.app')

@section('content')
<h1>Edit Bansos</h1>

<form action="{{ route('bansos.update', $bansos->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="nama">Nama Bansos</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $bansos->nama }}" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $bansos->deskripsi }}</textarea>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $bansos->jumlah }}" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal Penyaluran</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $bansos->tanggal }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
