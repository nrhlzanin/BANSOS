@extends('RW.layouts.main')

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
                        <a href="{{ route('admin.informasi-bansos.addBansos') }}" class="btn btn-primary">Tambah Bansos</a>
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
                                  <td>{{$bans->status}}</td>
                                  <td>{{$bans->keterangan}}</td>
                                  <td>
                                    <a href="{{ route('admin.informasi-bansos.show', ['id' => $bans->id_bansos]) }}" class="btn btn-success btn-sm" style="background-color: #19CD61;">Detail <i class="fa fa-info-circle"></i></a>
                                    <a href="{{ route('admin.informasi-bansos.edit', ['id' => $bans->id_bansos]) }}" class="btn btn-primary btn-sm" style="background-color: #1E90FF;">Edit <i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.informasi-bansos.destroy', ['id' => $bans->id_bansos]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="background-color: #FF0F0F;" onclick="return confirm('Are you sure you want to delete?')">Delete <i class="fa fa-trash"></i></button>
                                    </form>
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
<script>
    $(document).ready(function() {
        $('#bansosTable').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush
