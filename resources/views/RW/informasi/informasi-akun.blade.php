<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'PWL – Laravel Starter Code') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Untuk mengirimkan token Laravel CSRF pada setiap request ajax -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  @stack('css') <!-- Digunakan untuk memanggil custom css dari perintah push('css') pada masing-masing view -->

</head>
<body class="hold-transition sidebar-mini">
  @php
    $user = Auth::user();
    $rw = Auth::user()->rw;
  @endphp
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.header')
    <!-- /.navbar -->
    
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Informasi Akun</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Informasi Akun</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      @php
      $user = Auth::user();
      $rw = Auth::user()->rw;
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
                  <div class="admin-1">{{ $rw->nama_admin }}</div>
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
                    <input type="text" class="form-control" value="{{ $rw->nama_admin }}" disabled>
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
                  <input type="email" class="form-control" value="{{ $rw->no_telp }}">
                </div>
              </div>
              <div class="pt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
          <!-- /.container-fluid -->
      </div>

@include('layouts.footer')
</div>
</body>
