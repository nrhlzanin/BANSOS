<!-- Create Sub Kriteria Modal -->
<div class="modal fade" id="createSubKriteriaModal{{ $krit->id_kriteria }}" tabindex="-1" role="dialog" aria-labelledby="createSubKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createSubKriteriaModalLabel">Tambah Data Sub Kriteria {{ $krit->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form for creating a new Sub Kriteria -->
          <form action="{{ route('kriteria.storeSubKriteria', $krit->id_kriteria) }}" method="POST">
            @csrf
  
            <!-- Form fields for the Sub Kriteria -->
            <div class="form-group">
              <label for="name">Nama Sub Kriteria</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="min">Minimum</label>
              <input type="number" class="form-control" id="min" name="min" required>
            </div>
            <div class="form-group">
              <label for="max">Maksimum</label>
              <input type="number" class="form-control" id="max" name="max" required>
            </div>
            <div class="form-group">
              <label for="bobot">Bobot</label>
              <input type="number" class="form-control" id="bobot" name="bobot" required>
            </div>
  
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>