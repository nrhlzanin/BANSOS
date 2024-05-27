<div class="container mt-4">
  <div class="mt-2">
      <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-success custom-btn">
          Tambah Data Kriteria <i class="fa fa-plus icon-spacing" aria-hidden="true"></i>
      </a>
  </div>
  <div class="table-responsive mt-3">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Kode Kriteria</th>
                  <th>Nama Kriteria</th>
                  <th>Atribut</th>
                  <th>Bobot</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>C1</td>
                  <td>Pekerjaan Kepala Keluarga</td>
                  <td></td>
                  <td></td>
                  <td>
                      <a href="#" data-toggle="modal" data-target="#ModalDelete" class="btn btn-danger">
                          Delete <i class="fa fa-trash icon-spacing" aria-hidden="true"></i>
                      </a>
                      <a href="#" data-toggle="modal" data-target="#ModalEdit" class="btn btn-warning">
                          Edit <i class="fa fa-pencil-alt icon-spacing" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>
</div>

<!-- Modals -->
@include('livewire.kriteria.modal.create')
@include('livewire.kriteria.modal.edit')
@include('livewire.kriteria.modal.delete')