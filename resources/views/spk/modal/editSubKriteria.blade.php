<!-- Edit Sub Kriteria Modal -->
<div class="modal fade" id="editSubKriteriaModal{{ $krit->id_kriteria }}" tabindex="-1" role="dialog" aria-labelledby="editSubKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubKriteriaModalLabel">Edit Data Sub Kriteria {{ $krit->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing the Sub Kriteria -->
                <form action="{{ route('kriteria.updateSubKriteria', $krit->id_kriteria) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Form fields for the Sub Kriteria -->
                    <div class="form-group">
                        <label for="name">Nama Sub Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $krit->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="min">Minimum</label>
                        <input type="number" class="form-control" id="min" name="min" value="{{ $krit->min }}" required>
                    </div>
                    <div class="form-group">
                        <label for="max">Maksimum</label>
                        <input type="number" class="form-control" id="max" name="max" value="{{ $krit->max }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="number" class="form-control" id="bobot" name="bobot" value="{{ $krit->bobot }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>