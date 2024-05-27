<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PWL – Laravel Starter Code') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Untuk mengirimkan token Laravel CSRF pada setiap request ajax -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
        <main class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Daftar Penerima Bantuan Sosial</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Penerima</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div><!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" id="search-input" class="form-control"
                                                    placeholder="Cari berdasarkan nama">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" id="search-button"
                                                        type="button">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control">
                                                <option selected disabled>Filter berdasarkan bansos</option>
                                                <option value="1">Bantuan Lansung Tunai (BLT)</option>
                                                <option value="2">Program Keluarga Harapan (PKH)</option>
                                                <option value="3">Bantuan Pangan Non Tunai (BPNT)</option>
                                                <option value="3">Bansos Beras</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary float-right">Tambah
                                                Data</button>
                                        </div>
                                    </div>
                                    @if (session()->has('successUpdate'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('successUpdate') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <p id="no-data-alert" class="text-muted mt-4 text-center"
                                        style="font-style: italic;">Data penerima belum ada!</p>
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead style="background-color: #DAEEE7; color: #000;">
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="checkall">
                                                </th>
                                                <th scope="col" class="text-center p-2">No</th>
                                                <th scope="col" class="text-center">Nama Penerima <i
                                                        class="fa fa-sort fa-sm"></i></th>
                                                <th scope="col" class="text-center">Alamat</th>
                                                <th scope="col" class="text-center">Telepon</th>
                                                <th scope="col" class="text-center">Jenis Bantuan</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penerimas as $penerima)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="id_penerimabansos[]"
                                                            value="{{ $penerima->id }}">
                                                    </td>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $penerima->nama }}</td>
                                                    <td>{{ $penerima->desa }}</td>
                                                    <td>{{ $penerima->telepon }}</td>
                                                    <td>{{ $penerima->jenis_bantuan }}</td>
                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal"
                                                            data-target="#M" style="background-color: #19CD61;">Detail<i
                                                                class="fa fa-info-circle"></i></button>
                                                        <button class="btn btn-danger"
                                                            style="background-color: #FF0F0F;">Delete<i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section><!-- /.content -->
        </main><!-- /.content-wrapper -->

        @include('layouts.footer')
    </div><!-- ./wrapper -->

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

    <script>
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });

            // Cek apakah ada data dalam tabel
            if (table.rows().count() > 0) {
                $('#no-data-alert').hide();
            }

            $('#search-button').on('click', function() {
                var searchValue = $('#search-input').val();
                table.search(searchValue).draw();
            });
        });
    </script>
</body>

</html>
