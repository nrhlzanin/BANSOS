<!-- Modal structure -->
<div class="modal fade" id="ModalEdit{{ $kriteria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spk.modal.editKriteria', $kriteria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kode_kriteria">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="{{ $kriteria->kode }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $kriteria->name }}">
                    </div>
                    <div class="form-group">
                        <label for="type_kriteria">Tipe Kriteria</label>
                        <select class="form-control" id="type_kriteria" name="type_kriteria">
                            <option value="benefit" {{ $kriteria->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="cost" {{ $kriteria->type == 'cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="number" step="0.01" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
