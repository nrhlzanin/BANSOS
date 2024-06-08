@extends('RW.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <input type="text" id="search-input" class="form-control" placeholder="Cari berdasarkan nama">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" id="search-button" type="button">Cari</button>
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
                            </div>
                            @if (session()->has('successUpdate'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('successUpdate') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <p id="no-data-alert" class="text-muted mt-4 text-center" style="font-style: italic;">Data penerima belum ada!</p>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead style="background-color: #DAEEE7; color: #000;">
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="checkall">
                                        </th>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center">NIK</th>
                                        <th scope="col" class="text-center">Jenis Bansos</th>
                                        <th scope="col" class="text-center">Tanggal Penerimaan</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penerima_bansos as $index => $penerima)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="id_penerimabansos[]" value="{{ $penerima->id_penerimabansos }}">
                                            </td>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $penerima->alternatif->pengajuan->warga->nama_kepalaKeluarga }}</td>
                                            <td>{{ $penerima->alternatif->pengajuan->warga->no_nik }}</td>
                                            <td>{{ $penerima->bansos->jenis_bansos }}</td>
                                            <td>{{ $penerima->bansos->periode }}</td>
                                            <td>
                                                <a href="{{ route('admin.data-warga.show', ['id' => $penerima->id_penerimabansos]) }}" class="btn btn-success btn-sm" style="background-color: #fcf238; color: black;">Detail <i class="fa fa-info-circle"></i></a>
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

        $('.btn-delete').on('click', function() {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '/penerimas/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Data berhasil dihapus');
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
@endsection
