@extends('layouts.app')

@section('content')
<h1>Daftar Penerima Bansos</h1>
<a href="{{ route('penerima-bansos.create') }}" class="btn btn-primary">Tambah Penerima Bansos</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penerimaBansos as $penerimaBansos)
        <tr>
            <td>{{ $penerimaBansos->id }}</td>
            <td>{{ $penerimaBansos->nama }}</td>
            <td>{{ $penerimaBansos->nik }}</td>
            <td>{{ $penerimaBansos->alamat }}</td>
            <td>{{ $penerimaBansos->no_hp }}</td>
            <td>
                <a href="{{ route('penerima-bansos.show', $penerimaBansos->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('penerima-bansos.edit', $penerimaBansos->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('penerima-bansos.destroy', $penerimaBansos->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
