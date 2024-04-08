@extends('layouts.app')

@section('content')
<h1>Detail Penerima Bansos</h1>

<table class="table table-striped">
    <tr>
        <th>Nama Lengkap</th>
        <td>{{ $penerimaBansos->nama }}</td>
    </tr>
    <tr>
        <th>NIK</th>
        <td>{{ $penerimaBansos->nik }}</td>
    </tr>
    <tr>
        <th>Alamat Lengkap</th>
        <td>{{ $penerimaBansos->alamat }}</td>
    </tr>
    <tr>
        <th>Nomor Handphone</th>
        <td>{{ $penerimaBansos->no_hp }}</td>
    </tr>
</table>

<a href="{{ route('penerima-bansos.edit', $penerimaBansos->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('penerima-bansos.destroy', $penerimaBansos->id) }}" method="post" class="d-inline">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>
@endsection
