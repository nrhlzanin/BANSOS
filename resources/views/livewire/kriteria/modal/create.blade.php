<!-- Your Blade Template -->
<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Tambah Data Kriteria')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store" id="createForm">
                    <div class="form-group">
                        <label for="kode">Kode Kriteria:</label>
                        <input wire:model="kode" type="text" class="form-control" id="kode" placeholder="Masukkan Kode Kriteria">
                    </div>                        
                    <div class="form-group">
                        <label for="name">Nama Kriteria:</label>
                        <input wire:model="nama" type="text" class="form-control" id="name" placeholder="Masukkan Nama Kriteria">
                    </div>                                               
                    <div class="form-group">
                        <label for="type">Atribut:</label>
                        <select wire:model="type" class="form-control" id="type">
                            <option value="1">Benefit</option>
                            <option value="0">Cost</option>
                        </select>
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
        Livewire.on('dataStored', function () {
            // Do something after data is stored successfully
            // For example, close the modal
            $('#ModalCreate').modal('hide');
        });
    });
</script>
