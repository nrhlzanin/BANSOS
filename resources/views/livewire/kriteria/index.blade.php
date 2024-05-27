@extends('RW.layouts.main')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sistem Pendukung Keputusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Perankingan</a></li>
              <li class="breadcrumb-item active">BLT</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="col-md-4">
        <select class="form-control">
            <option selected disabled>Filter berdasarkan tahun</option>
            <option value="1">2024</option>
            <option value="2">2023</option>
            <option value="3">2022</option>
            <option value="3">2021</option>
        </select>
    </div>
    <div class="mt-4">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            @include('livewire.layouts.menu')
                        </div>
                        <div class="mt-2">
                            <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-success custom-btn">
                                Tambah Data Kriteria <i class="fa fa-plus icon-spacing" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="table-responsive mt-3" >          
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
                                      @include('livewire.kriteria.modal.edit')
                                      @include('livewire.kriteria.modal.delete')
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->
        <!-- Main content -->
        @include('livewire.kriteria.modal.create')
        <section class="content">
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">