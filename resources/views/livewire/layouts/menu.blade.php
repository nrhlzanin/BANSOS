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
              <div class="d-flex justify-content-between">
                <nav class="nav nav-pills">
                  <a class="nav-link active" id="kriteria-tab" data-toggle="pill" href="#kriteria">Kriteria</a>
                  <a class="nav-link" id="subkriteria-tab" data-toggle="pill" href="#subkriteria">Sub Kriteria</a>
                  <a class="nav-link" id="normalisasi-tab" data-toggle="pill" href="#normalisasi">Normalisasi</a>
                  <a class="nav-link" id="perhitungan-tab" data-toggle="pill" href="#perhitungan">Perhitungan</a>
                </nav>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#simpanRanking">Simpan Rangking</button>
              </div>

              <div class="modal fade" id="simpanRanking" tabindex="-1" role="dialog" aria-labelledby="simpanRankingLabel" aria-hidden="true">
                @include('livewire.kriteria.modal.simpan')
              </div>

              <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="kriteria" role="tabpanel">
                  @livewire('kriteria.index')
                </div>
                <div class="tab-pane fade" id="subkriteria" role="tabpanel">
                  @include('livewire.subkriteria.index')
                </div>
                <div class="tab-pane fade" id="normalisasi" role="tabpanel">
                  @include('livewire.perhitungan.index')
                </div>
                <div class="tab-pane fade" id="perhitungan" role="tabpanel">
                 @include('livewire.penilaian.index')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Handle tab click
      $('.nav-link').on('click', function(e) {
        e.preventDefault();
        $('.nav-link').removeClass('active');
        $(this).addClass('active');

        const selectedTab = $(this).attr('href');
        $('.tab-pane').removeClass('show active');
        $(selectedTab).addClass('show active');
      });

      // Trigger click on the active tab to ensure content is displayed correctly on load
      $('.nav-link.active').trigger('click');
    });
  </script>
@endsection
