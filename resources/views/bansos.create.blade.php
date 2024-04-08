@extends('layouts.app')

@section('content')
<h1>Daftar Bansos</h1>
<a href="{{ route('bansos.create') }}" class="btn btn-primary">Tambah Bansos</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bansos as $bansos)
        <tr>
            <td>{{ $bansos->id }}</td>
            <td>{{ $bansos->nama }}</td>
            <td>{{ $bansos->deskripsi }}</td>
            <td>{{ $bansos->jumlah }}</td>
            <td>{{ $bansos->tanggal }}</td>
            <td>
                <a href="{{ route('bansos.show', $bansos->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('bansos.edit', $bansos->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('bansos.destroy', $bansos->id) }}" method="post" class="d-inline">
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
