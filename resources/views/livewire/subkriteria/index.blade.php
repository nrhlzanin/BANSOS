<!-- Your Blade Template -->
<div class="card mt-4">
  <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #dafadb;">
    @if(isset($kriteria))
      <h3 style="font-size: 20px; font-weight: bold;">{{ $kriterias->name }}</h3>
    @else
      <h3 style="font-size: 20px; font-weight: bold;">Kriteria Tidak Ditemukan</h3>
    @endif
    <a href="#" data-toggle="modal" data-target="#ModalEditSubKriteria" class="btn btn-warning">
      Isi Bobot <i class="fa fa-pencil-alt icon-spacing" aria-hidden="true"></i>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive mt-1">
      <table class="table mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Keterangan Crips</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @@foreach($kriteria->subkriteria as $sub)
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <button wire:click="delete()" class="btn btn-danger">
                Delete <i class="fa fa-trash icon-spacing" aria-hidden="true"></i>
              </button>
            </td>
          </tr>
          @@endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@livewireScripts

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('saved', function () {
            $('#ModalEditSubKriteria').modal('hide');
        });
    });
</script>
