@foreach ($kriterias as $krit)
<div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="ModalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCreateLabel">Tambah Data Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spk.modal.createKriteria') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Atribut</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="benefit" {{ old('type') == 'benefit'? 'elected' : '' }}>Benefit</option>
                            <option value="cost" {{ old('type') == 'cost'? 'elected' : '' }}>Cost</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="number" class="form-control" id="bobot" name="bobot" value="{{ old('bobot') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach