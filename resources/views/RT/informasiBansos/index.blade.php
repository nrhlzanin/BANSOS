@extends('layouts.appRT')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Informasi Bansos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('petugas') }}">Home</a></li>
              <li class="breadcrumb-item active">Informasi Bansos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="text-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Informasi Penyaluran Bantuan Sosial</h1>
        <p class="col-lg-8 m-auto">Kontrol setiap penyaluran informasi bantuan sosial kepada masyarakat</p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                      </div>
                      @if (session()->has('successUpdate'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('successUpdate') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive mt-4">          
                                <table id="bansosTable" class="table table-striped">
                                    <thead style="background-color: #DAEEE7; color: #000;">
                                      <tr>
                                        <th>#</th>
                                        <th>Asal Bansos</th>
                                        <th>Jenis Bansos</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bansos as $index => $bans)
                                        <tr>
                                          <td>{{ $index + 1 }}</td>
                                          <td>{{ $bans->asal_bansos }}</td>
                                          <td>{{ $bans->jenis_bansos }}</td>
                                          <td>{{ $bans->periode }}</td>
                                          <td>{{ $bans->status }}</td>
                                          <td>{{ $bans->keterangan }}</td>
                                          <td>
                                            <a href="{{ route('petugas.bansosrt.show', ['id' => $bans->id_bansos]) }}" class="btn btn-success btn-sm" style="background-color: #19CD61;">Detail <i class="fa fa-info-circle"></i></a>
                                        </td>                                      
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                              </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @push('js')
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#bansosTable').DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
            });
        </script>
        @endpush
