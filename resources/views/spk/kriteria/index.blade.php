<div class="container mt-4">
    <div class="mt-2">
        <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-success custom-btn">
            Tambah Data Kriteria <i class="fa fa-plus icon-spacing" aria-hidden="true"></i>
        </a>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Kriteria</th>
                    <th>Nama Kriteria</th>
                    <th>Bobot</th>
                    <th>Atribut</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriterias as $kriteria)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kriteria->kode }}</td>
                    <td>{{ $kriteria->name }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                    <td>{{ $kriteria->type }}</td>
                    <td>
                        <a href="{{ route('spk.kriteria.delete', $kriteria->id) }}" data-toggle="modal" data-target="#ModalDelete" class="btn btn-danger">
                            Delete <i class="fa fa-trash icon-spacing" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('spk.kriteria.edit', $kriteria->id) }}" data-toggle="modal" data-target="#ModalEdit" class="btn btn-warning">
                            Edit <i class="fa fa-pencil-alt icon-spacing" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    <!-- Modals -->
    @include('spk.kriteria.modal.create')
    @include('spk.kriteria.modal.edit')
    @include('spk.kriteria.modal.delete')
</div>
<script>
    if (table.rows().count() > 0) {
                $('#no-data-alert').hide();
            }
</script>
