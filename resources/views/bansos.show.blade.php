@extends('layouts.app')

@section('content')
<h1>Detail Bansos</h1>

<table class="table table-striped">
    <tr>
        <th>Nama</th>
        <td>{{ $bansos->nama }}</td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>{{ $bansos->deskripsi }}</td>
    </tr>
    <tr>
        <th>Jumlah</th>
        <td>{{ $bansos->jumlah }}</td>
    </tr>
    <tr>
        <th>Tanggal Penyaluran</th>
        <td>{{ $bansos->tanggal }}</td>
    </tr>
</table>

<a href="{{ route('bansos.edit', $bansos->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('bansos.destroy', $bansos->id) }}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>
@endsection
