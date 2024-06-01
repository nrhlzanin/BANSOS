<!-- resources/views/account/info.blade.php -->
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
      <div class="dashboard">
        <div class="container-1">
          <div class="tabel-akun">
            <img class="rectangle-14" src="../assets/vectors/rectangle_141_x2.svg" />
            <div class="container-18">
              <span class="profile">Profile</span>
            </div>
            <div class="container-2">
              <div class="image-21">
                <img src="{{ asset('img/profile.png') }}">
              </div>
              <div class="group-848">
                <div class="admin-1">{{ $user->username }}</div>
                <div class="ganti-foto-profile">
                  Ganti Foto Profile
                </div>
                <span class="no-file-chosen">
                  No file chosen
                  <button class="edit-1">Choose File</button>
                </span>
              </div>
            </div>
            <div class="group-847">
              <div class="nama">
                <label>Nama :</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                </div>
              </div>
              <div class="username">
                <label>Username :</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="{{ $user->username }}" disabled>
                </div>
              </div>
              <div class="password">
                <label>Password :</label>
                <input type="password" class="form-control" value="{{ $user->password }}">
              </div>
              <div class="email">
                <label>Email :</label>
                <input type="email" class="form-control" value="{{ $user->email }}">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </div>
        <div class="tabel-akun-1">
          <img class="rectangle-141" src="../assets/vectors/rectangle_14_x2.svg" />
          <div class="rectangle-331"></div>
          <div class="container-13">
            <div class="data">Data</div>
            <form class="form-group">
              <div class="form-row">
                  <label for="nik">NIK:</label>
                  <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}" disabled>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}" disabled>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="rt">RT:</label>
                  <select class="form-control" id="rt" name="rt" disabled>
                    <option value="1" {{ $user->rt == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $user->rt == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $user->rt == 3 ? 'selected' : '' }}>3</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="rw">RW:</label>
                  <select class="form-control" id="rw" name="rw" disabled>
                    <option value="1" {{ $user->rw == 1 ? 'selected' : '' }}>1</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="jenis_kelamin">Jenis Kelamin:</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" disabled>
                    <option value="laki-laki" {{ $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="status">Status:</label>
                  <select class="form-control" id="status" name="status" disabled>
                    <option value="menikah" {{ $user->status == 'menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="tidak_aktif" {{ $user->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                  </select>
                </div>
              </
