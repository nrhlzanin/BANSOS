@extends('layouts.appRT')

@section('title', 'Data Pengajuan Warga')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('petugas') }}">Home</a></li>
              <li class="breadcrumb-item active">Data Pengajuan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      @if (session()->has('successUpdate'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('successUpdate') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      @endif
                      <h1>Data Pengajuan RT: {{ $no_rt }}</h1>
                      <div class="table-responsive mt-4">          
                          <table id="pengajuanTable" class="table table-striped">
                              <thead style="background-color: #DAEEE7; color: #000;">
                                <tr>
                                  <th>ID Pengajuan</th>
                                  <th>No KK</th>
                                  <th>No NIK</th>
                                  <th>Nama Kepala Keluarga</th>
                                  <th>Status Data</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($pengajuans as $index => $pengajuan)
                                <tr>
                                  <td>{{ $pengajuan->id_pengajuan }}</td>
                                  <td>{{ $pengajuan->warga->no_kk }}</td>
                                  <td>{{ $pengajuan->warga->no_nik }}</td>
                                  <td>{{ $pengajuan->warga->nama_kepalaKeluarga }}</td>
                                  <td>{{ $pengajuan->status_data }}</td>
                                  <td>
                                    <a href="{{ route('petugas.data-pengajuan.detail', $pengajuan->id_pengajuan) }}" class="btn btn-info btn-sm">Detail</a>
                                    @if($pengajuan->status_data == 'belum tervalidasi')
                                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#validateModal{{ $pengajuan->id_pengajuan }}">Validasi</button>
                                    @endif
                                    <!-- Delete Button -->
                                    <form action="{{ route('petugas.data-pengajuan.destroy', $pengajuan->id_pengajuan) }}" method="POST" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                  </form>
                                  </td>                                      
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="validateModal{{ $pengajuan->id_pengajuan }}" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="validateModalLabel">Validasi Pengajuan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah data pengajuan telah sesuai?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('data-pengajuan.validasi', $pengajuan->id_pengajuan) }}" method="POST">
                                          @csrf
                                          @method('PUT')
                                          <button type="submit" class="btn btn-success">Validasi</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
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
        $('#pengajuanTable').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endpush