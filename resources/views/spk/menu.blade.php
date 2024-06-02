@extends('RW.layouts.main')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sistem Pendukung Keputusan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Perankingan</a></li>
            <li class="breadcrumb-item active">BLT</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 mt-2">
    <select class="form-control" id="filterTahun">
      <option selected disabled>Filter berdasarkan tahun</option>
      <option value="1">2024</option>
      <option value="2">2023</option>
      <option value="3">2022</option>
      <option value="4">2021</option>
    </select>
  </div>

  <div class="mt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link " id="kriteria-tab" data-toggle="tab" href="#kriteria" role="tab" aria-controls="kriteria" aria-selected="true">Kriteria</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="subkriteria-tab" data-toggle="tab" href="#subkriteria" role="tab" aria-controls="subkriteria" aria-selected="false">Sub Kriteria</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="normalisasi-tab" data-toggle="tab" href="#normalisasi" role="tab" aria-controls="normalisasi" aria-selected="false">Normalisasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="perhitungan-tab" data-toggle="tab" href="#perhitungan" role="tab" aria-controls="perhitungan" aria-selected="false">Perhitungan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="perankingan-tab" data-toggle="tab" href="#perankingan" role="tab" aria-controls="perankingan" aria-selected="false">Perankingan</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <!-- Kriteria tab content -->
                <div class="tab-pane fade" id="kriteria" role="tabpanel" aria-labelledby="kriteria-tab">
                  <div class="container mt-4">
                    <div class="mt-2">
                      @include('spk.modal.createKriteria')
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($kriterias)

                                @forelse ($kriterias as $index => $krit)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $krit->kode }}</td>
                                        <td>{{ $krit->name }}</td>
                                        <td>{{ $krit->type }}</td>
                                        <td>
                                          @include('spk.modal.editKriteria')
                                          <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $krit->id }}" class="btn btn-warning">
                                            Edit <i class="fa fa-pencil-alt icon-spacing" aria-hidden="true"></i>
                                        </a>                                      
                                        <a href="#" data-toggle="modal" data-target="#ModalDelete{{ $krit->id }}" class="btn btn-danger">
                                            Delete <i class="fa fa-trash icon-spacing" aria-hidden="true"></i>
                                        </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada kriteria yang ditemukan.</td>
                                    </tr>
                                @endforelse
                                @endisset
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                </div>
                <!-- Sub Kriteria tab content -->
                <div class="tab-pane fade" id="subkriteria" role="tabpanel" aria-labelledby="subkriteria-tab">
                  <div class="card mt-4">
                    @foreach($kriterias as $kriteria)
                      <div class="mt-6 mx-6">
                        <div class="card">
                          <div class="card-header">
                            <h3>{{ $kriteria->name }} ({{ $kriteria->kode }})</h3>
                          </div>
                          <div class="mt-2">
                            <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-success custom-btn">
                              Tambah Data Sub Kriteria <i class="fa fa-plus icon-spacing" aria-hidden="true"></i>
                            </a>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @isset($subkriteria)
                                    @foreach($subkriteria->where('kriteria_id', $kriteria->id) as $item)
                                      <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>
                                          <form action="{{ route('subkriteria.destroy', ['kriteriaId' => $kriteria->id, 'ubkriteriaId' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                          </form>
                                        </td>
                                      </tr>
                                    @endforeach
                                  @endisset
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                <!-- Normalisasi tab content -->
                <div class="tab-pane fade " id="normalisasi" role="tabpanel" aria-labelledby="normalisasi-tab">
                  <div class="card mt-4">
                    <div class="card-body">
                      <div class="table-responsive mt-3">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="showEntries" class="form-label">Show</label>
                            <select class="form-control form-control-sm" id="showEntries">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control form-control-sm" id="search">
                          </div>
                        </div>
                        <div class="card-header">
                          <h3>Hasil Analisa</h3>
                        </div>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Alternatif</th>
                              @foreach($kriterias as $kriteria)
                                <th>{{ $kriteria->name }}</th>
                              @endforeach
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($alternatives as $alternative)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $alternative->name }}</td>
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $psiScores[$alternative->id][$kriteria->id] }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                      </div>
                      <div class="row right-content-between mt-3">
                        <div class="col-md-6">
                          <nav aria-label="Pagination">
                            <ul class="pagination right-content-end">
                              <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Perhitungan tab content -->
                <div class="tab-pane fade" id="perhitungan" role="tabpanel" aria-labelledby="perhitungan-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Normalisasi Matrik</h3>
                        </div>
                        <div class="card-body">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Alternatif</th>
                                <?php //foreach ($kriteria as $kriteria) {?>
                                  <th><?//= $kriteria->nama_kriteria?></th>
                                <?php //}?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php //foreach ($alternatif as $alternatif) {?>
                                <tr>
                                  <td><?//= $alternatif->id_alternatif?></td>
                                  <td><?//= $alternatif->nama_alternatif?></td>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <td><?//= $alternatif->nilai_kriteria[$kriteria->id_kriteria]?></td>
                                  <?php //}?>
                                </tr>
                              <?php //}?>
                              <tr>
                                <th colspan="2">Total</th>
                                <?php //foreach ($kriteria as $kriteria) {?>
                                  <th><?//= array_sum(array_column($alternatif, 'nilai_kriteria')[$kriteria->id_kriteria])?></th>
                                <?php //}?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!--Rata-Rata Kinerja-->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Rata-Rata Kinerja</h3>
                          </div>
                          <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <th><?//= $kriteria->nama_kriteria?></th>
                                  <?php// }?>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <td><?//= number_format(array_sum(array_column($alternatif, 'nilai_kriteria')[$kriteria->id_kriteria]) / count($alternatif), 2)?></td>
                                  <?php //}?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Nilai Variasi Preferensi-->
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Variasi Preferensi</h3>
                          </div>
                          <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Alternatif</th>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <th><?//= $kriteria->nama_kriteria?></th>
                                  <?php //}?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php //foreach ($alternatif as $alternatif) {?>
                                  <tr>
                                    <td><?//= $alternatif->id_alternatif?></td>
                                    <td><?//= $alternatif->nama_alternatif?></td>
                                    <?php //foreach ($kriteria as $kriteria) {?>
                                      <td><?//= $alternatif->nilai_kriteria[$kriteria->id_kriteria]?></td>
                                    <?php //}?>
                                  </tr>
                                <?php //}?>
                                <tr>
                                  <th colspan="2">Total</th>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <th><?//= array_sum(array_column($alternatif, 'nilai_kriteria')[$kriteria->id_kriteria])?></th>
                                  <?php //}?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <!--Penentuan Deviasi Nilai Preferensi-->
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Penentuan Deviasi Nilai Preferensi</h3>
                          </div>
                          <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <th><?//= $kriteria->nama_kriteria?></th>
                                  <?php// }?>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <td><?//= number_format(array_sum(array_column($alternatif, 'nilai_kriteria')[$kriteria->id_kriteria]) / count($alternatif), 2)?></td>
                                  <?php //}?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    <!--Bobot Kriteia-->
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Bobot Kriteria</h3>
                          </div>
                          <div class="card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <th><?//= $kriteria->nama_kriteria?></th>
                                  <?php// }?>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <?php //foreach ($kriteria as $kriteria) {?>
                                    <td><?//= number_format(array_sum(array_column($alternatif, 'nilai_kriteria')[$kriteria->id_kriteria]) / count($alternatif), 2)?></td>
                                  <?php //}?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Perankingan-->
                  <div class="tab-pane fade" id="perankingan" role="tabpanel" aria-labelledby="perankingan-tab">
                    <div class="container mt-4">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Alternatif</th>
                            <?php //foreach ($kriteria as $kriteria) {?>
                              <th><?//= $kriteria->nama_kriteria?></th>
                            <?php //}?>
                            <th>Score PSI</th>
                            <th>Rank</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php// $rank = 1; foreach ($alternatif as $alternatif) {?>
                          <tr>
                            <td><?//= $rank++?></td>
                            <td><?//= $alternatif->nama_alternatif?></td>
                            <?php //foreach ($kriteria as $kriteria) {?>
                              <td><?//= $alternatif->nilai_kriteria[$kriteria->id_kriteria]?></td>
                            <?php //}?>
                            <td><?//= number_format($alternatif->score_psi, 2)?></td>
                            <td><?//= $rank - 1?></td>
                          </tr>
                          <?php //}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
