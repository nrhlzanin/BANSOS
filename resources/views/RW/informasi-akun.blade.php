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
              <h1 class="m-0">Dashboard</h1>
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
                <div class="admin-1">Admin</div>
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
                  <input type="text" class="form-control" disabled>
                </div>
              </div>
              <div class="username">
                <label>Username :</label>
                <div class="input-group">
                  <input type="text" class="form-control" disabled>
                </div>
              </div>
              <div class="username">
                <label>Username :</label>
                <input type="text" class="form-control" disabled>
              </div>
              <div class="password">
                <label>Password :</label>
                <input type="password" class="form-control">
              </div>
              <div class="email">
                <label>Email :</label>
                <input type="email" class="form-control">
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
                <div class="form-group col-md-6">
                  <label for="nik">NIK:</label>
                  <input type="text" class="form-control" id="nik" name="nik" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="no_kk">No KK:</label>
                  <input type="text" class="form-control" id="no_kk" name="no_kk" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" disabled>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="jenis_kelamin">Jenis Kelamin:</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" disabled>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="jumlah_anggota">Jumlah Anggota Keluarga:</label>
                  <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" disabled>
                  <option value="aktif">Menikah</option>
                  <option value="tidak_aktif">Tidak Aktif</option>
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
  @include('layouts.footer')
</div> <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
  <script>
    //Untuk mengirimkan token Laravel CSRF pada setiap request ajax
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
  @stack('js') <!-- Digunakan untuk memanggil custom js dari perintah push('js') pada masing-masing view -->
</body>
</html>
