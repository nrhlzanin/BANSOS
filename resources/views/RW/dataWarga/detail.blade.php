@extends('RW.layouts.main')

@section('content')
<div class="container">
    <h1>Detail Penerima</h1>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $penerima->nama }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $penerima->nik }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $penerima->telepon }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $penerima->alamat }}</td>
        </tr>
        <tr>
            <th>Jenis Bantuan</th>
            <td>{{ $penerima->jenis_bantuan }}</td>
        </tr>
    </table>
    <a href="{{ route('data-warga') }}" class="btn btn-primary">Kembali</a>
</div>    
@endsection
