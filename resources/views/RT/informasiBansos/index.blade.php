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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <div class="table-responsive mt-4">          
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Asal Bansos</th>
                                        <th>Jenis Bansos</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Ketreangan</th>
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
                                        <td>{{$bans->status}}</td>
                                        <td>{{$bans->keterangan}}</td>
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
