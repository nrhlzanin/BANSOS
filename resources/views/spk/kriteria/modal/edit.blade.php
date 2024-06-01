<form action="" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Edit Data Kriteria')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="kriteria">Nama Kriteria:</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Masukkan Nama Kriteria">
                        </div>                        
                        <div class="form-group">
                            <label for="status">Atribut:</label>
                            <select class="form-control" id="atribut" name="atribut">
                                <option hidden>Pilih Atribut</option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>