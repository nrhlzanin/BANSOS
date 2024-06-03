<!-- Edit Sub Kriteria Modal -->
@foreach($kriterias as $kriteria)
  <div class="modal fade" id="editSubKriteriaModal{{ $kriteria->id }}" tabindex="-1" role="dialog" aria-labelledby="editSubKriteriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSubKriteriaModalLabel">Edit Sub Kriteria {{ $kriteria->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form for editing a Sub Kriteria -->
          <form action="" method="POST">
            @csrf
            @method('PUT')

            <!-- Form fields for the Sub Kriteria -->
            <div class="form-group">
              <label for="name">Nama Sub Kriteria</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $kriteria->name }}" required>
            </div>
            <div class="form-group">
              <label for="min">Minimum</label>
              <input type="number" class="form-control" id="min" name="min" value="{{ $kriteria->min }}" required>
            </div>
            <div class="form-group">
              <label for="max">Maksimum</label>
              <input type="number" class="form-control" id="max" name="max" value="{{ $kriteria->max }}" required>
            </div>
            <div class="form-group">
              <label for="bobot">Bobot</label>
              <input type="number" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach