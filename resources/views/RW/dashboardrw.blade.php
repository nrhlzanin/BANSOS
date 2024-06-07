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
    <!-- Navbar -->
      <!-- Sidebar -->
    @include('layouts.sidebar')
      <!-- Sidebar -->

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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6" >
                  <!-- small box -->
                  <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner" style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/pedataan.png') }}" alt="Your Image" style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Pendataan Warga  <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner" style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/validasi.png') }}" alt="Your Image" style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ url('validasi') }}" class="small-box-footer" style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Validasi Warga <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner" style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/checklist.png') }}" alt="Your Image" style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ url('informasi-bansos') }}" class="small-box-footer" style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Informasi Bansos  <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                        <div class="inner" style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/ranking.png') }}" alt="Your Image" style="width: 50%; height: auto; border-radius: 5px;">
                        </div>
                        <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Perankingan  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
              </div>
            </div>
        </section>
        <iframe class="mx-auto" width="1200" height="450" src="https://lookerstudio.google.com/embed/reporting/84bbb4c5-7abc-4494-b344-b143d6faed53/page/p_bee5t6e1hd" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
    </div>
    @include('layouts.footer')
  </div>
  <!-- Site wrapper -->

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