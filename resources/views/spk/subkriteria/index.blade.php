<div class="card mt-4">
    <div class="mt-6 mx-6">
        <div class="card">
            <div class="card-header">
                <h3></h3>
            </div>
            <div class="mt-2">
                <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-success custom-btn">
                    Tambah Data Sub Kriteria <i class="fa fa-plus icon-spacing" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="mt-6 mx-6">
        <div class="card">
            <div class="card-header">
                <h3>Data Sub Kriteria</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subkriteria as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->bobot }}</td>
                                    <td>
                                        <form action="{{ route('subkriteria.destroy', ['kriteriaId' => $kriteria->id, 'subkriteriaId' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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

<!-- Modal -->
<div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sub Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subkriteria.store', ['kriteriaId' => $kriteria->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Sub Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
