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
                  <a class="nav-link {{ Request::is('admin/perankingan/kriteria') ? 'active' : '' }}" id="kriteria-tab" href="{{ route('admin.kriteria.index') }}">Kriteria</a>
                  <a class="nav-link {{ Request::is('admin/perankingan/subkriteria') ? 'active' : '' }}" id="subkriteria-tab" href="{{ route('admin.subkriteria.index') }}">Sub Kriteria</a>
                  <a class="nav-link {{ Request::is('admin/perankingan/normalisasi') ? 'active' : '' }}" id="normalisasi-tab" href="{{ route('admin.normalisasi.index') }}">Normalisasi</a>
                  <a class="nav-link {{ Request::is('admin/perankingan/perhitungan') ? 'active' : '' }}" id="perhitungan-tab" href="{{ route('admin.perhitungan.index') }}">Perhitungan</a>
              </nav>              
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#simpanRanking">Simpan Rangking</button>
              </div>

              <div class="modal fade" id="simpanRanking" tabindex="-1" role="dialog" aria-labelledby="simpanRankingLabel" aria-hidden="true">
                @include('spk.kriteria.modal.simpan')
              </div>

              <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="kriteria" role="tabpanel">
                  @include('spk.kriteria.index')
                </div>
                <div class="tab-pane fade" id="subkriteria" role="tabpanel">
                  @include('spk.subkriteria.index')
                </div>
                <div class="tab-pane fade" id="normalisasi" role="tabpanel">
                  @include('spk.perhitungan.index')
                </div>
                <div class="tab-pane fade" id="perhitungan" role="tabpanel">
                 @include('spk.penilaian.index')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
