@extends('layouts.appRT')

@section('title', 'Informasi Akun')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Informasi Akun</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Informasi Akun</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
@php
  $user = Auth::user();
  $rt = Auth::user()->rt;
@endphp
      <!-- Main content -->
  <div class="dashboard">
    <div class="container-1 bg-light">
      <div class="">
        <!-- <img class="rectangle-14" src="../assets/vectors/rectangle_141_x2.svg" /> -->
        <div class="w-100 mb-3 p-2 d-flex justify-content-center align-items-center rounded-top-4"  style="background: #127C56;">
          <span class="fs-2 text-light">Profile</span>
        </div>
        <form action="" method="POST">
          <div class="px-5 d-flex">
            <div class="image-21">
              <img src="{{ asset('img/profile.png') }}">
            </div>
            <div class="group-848">
              <div class="admin-1">{{ $rt->nama_petugas }}</div>
              <div class="ganti-foto-profile">
                Ganti Foto Profile
              </div>
              <input type="file" type="file">
            </div>
          </div>
          <div class="px-5">
            <div class="nama mb-3">
              <label>Nama :</label>
              <div class="input-group">
                <input type="text" class="form-control" value="{{ $rt->nama_petugas }}" disabled>
              </div>
            </div>
            <div class="username mb-3">
              <label>Username :</label>
              <div class="input-group">
                <input type="text" class="form-control" value="{{ $user->username }}" disabled>
              </div>
            </div>
            <div class="password mb-3">
              <label>Password :</label>
              <input type="password" class="form-control">
            </div>
            <div class="email mb-3">
              <label>Email :</label>
              <input type="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="notelp">
              <label>Nomor Telp :</label>
              <input type="email" class="form-control" value="{{ $rt->no_telp }}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
      <!-- /.container-fluid -->

  </div>
@endsection