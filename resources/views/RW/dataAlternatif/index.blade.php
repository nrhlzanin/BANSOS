@extends('RW.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Alternatif Pengajuan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Alternatif</li>
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
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="button" id="tambah_penerimaBansos" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Tambah Penerima</button>
                    </div>
                    <p id="no-data-alert" class="text-muted mt-4 text-center" style="font-style: italic;">Data Alternatif belum ada!</p>
                    <table id="example1" class="table table-bordered table-hover">
                        <thead style="background-color: #DAEEE7; color: #000;">
                            <tr>
                                <th>
                                    <input type="checkbox" id="checkall">
                                </th>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">NIK</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">No RT</th>
                                <th scope="col" class="text-center">Status Pengajuan</th>
                                <th scope="col" class="text-center">Tanggal Pengajuan</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajuans as $index => $pengajuan)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id_pengajuan[]" data-pengajuan="{{ $pengajuan->id_pengajuan }}">
                                    </td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pengajuan->warga->no_nik }}</td>
                                    <td>{{ $pengajuan->warga->nama_kepalaKeluarga }}</td>
                                    <td>{{ $pengajuan->warga->no_rt }}</td>
                                    <td>{{ $pengajuan->status_pengajuan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pengajuan->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.data-alternatif.show', ['id' => $pengajuan->id_pengajuan]) }}" class="btn btn-success btn-sm" style="background-color: #19CD61;">Detail <i class="fa fa-info-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Bansos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <select class="form-control" id="form-select-bansos">
                @foreach ($bansos as $bs)
                    <option value="{{$bs->id_bansos}}">{{$bs->jenis_bansos}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" id="save">Simpan</button>
        </div>
        </div>
    </div>
    </div>
</div><!-- /.container-fluid -->

@push('js')

<script>
    $(document).ready(function() {
        const table = $('#example1').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });

        // Cek apakah ada data dalam tabel
        if (table.rows().count() > 0) {
            $('#no-data-alert').hide();
        }

        $('#save').on('click', () => {
            var rows = $(table.rows({
                selected: true
            }).$('input[type="checkbox"]').map(function(e) {
                return $(this).prop("checked") ? $(this).attr('data-pengajuan') : null
            })).toArray();

            const id_bansos = $('#form-select-bansos').find('option:selected').val();

            $.ajax({
                type: 'PUT',
                url: '/admin/data-alternatif-warga/to/penerima',
                serverSide: true,
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}", 
                    contentType: 'application/json'
                },
                data: {
                    id_bansos,
                    id_pengajuan: rows.length === 0 ? [] : rows
                },
                success: function(res) {
                    if (res.success) {
                        window.location.reload();
                    }
                }
            })
        });
    });
</script>
@endpush
@endsection
