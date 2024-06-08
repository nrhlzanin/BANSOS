@extends('layouts.appRT')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Detail Akun</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('petugas') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Akun</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <td>{{ $akun->username }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $akun->email }}</td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td>{{ $akun->level }}</td>
                </tr>
            </table>
            <a href="{{ route('petugas.data-akun-warga.edit', $akun->id_user) }}" class="btn btn-primary">Edit Akun</a>
            <a href="{{ route('petugas.data-akun-warga') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
