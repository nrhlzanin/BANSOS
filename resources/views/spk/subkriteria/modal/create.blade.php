<!-- Modal Create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Tambah Data Sub Kriteria')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store" id="createdForm">
                    <div class="form-group">
                        <label for="name">Nama Sub Kriteria</label>
                        <input id="name" wire:model="name" type="text" class="form-control" autofocus />
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="bobot">Nilai Bobot</label>
                        <input id="bobot" wire:model="bobot" type="text" class="form-control" />
                        @error('bobot') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
  </div>
 @livewireScripts 
 <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('saved', function () {
            $('#ModalCreate').modal('hide');
        });
    });
  </script>