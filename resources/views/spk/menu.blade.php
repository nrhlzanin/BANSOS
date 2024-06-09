

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
                                    <a class="nav-link active" id="kriteria-tab" data-toggle="tab" href="#kriteria"
                                        role="tab" aria-controls="kriteria" aria-selected="true">Kriteria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="subkriteria-tab" data-toggle="tab" href="#subkriteria"
                                        role="tab" aria-controls="subkriteria" aria-selected="false">Sub Kriteria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="normalisasi-tab" data-toggle="tab" href="#normalisasi"
                                        role="tab" aria-controls="normalisasi" aria-selected="false">Normalisasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="perhitungan-tab" data-toggle="tab" href="#perhitungan"
                                        role="tab" aria-controls="perhitungan" aria-selected="false">Perhitungan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="perankingan-tab" data-toggle="tab" href="#perankingan"
                                        role="tab" aria-controls="perankingan" aria-selected="false">Perankingan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- Kriteria tab content -->
                                <div class="tab-pane fade show active" id="kriteria" role="tabpanel"
                                    aria-labelledby="kriteria-tab">
                                    <div class="container mt-4">
                                        <div class="mt-2">
                                            
                                            <a href="#" data-toggle="modal" data-target="#ModalCreate"
                                                class="btn btn-success custom-btn">
                                                Tambah Data Kriteria <i class="fa fa-plus icon-spacing"
                                                    aria-hidden="true"></i>
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
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sub Kriteria tab content -->
                                <div class="tab-pane fade" id="subkriteria" role="tabpanel"
                                    aria-labelledby="subkriteria-tab">
                                    <div class="card mt-4">
                                        
                                            <div class="mt-6 mx-6">
                                                <div class="card">
                                                    <div
                                                        class="card-header d-flex justify-content-between align-items-center">
                                                        <h3></h3>
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-success custom-btn mr-2 btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#createSubKriteriaModal">
                                                                Tambah Data Sub Kriteria <i class="fa fa-plus icon-spacing"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#editSubKriteriaModal">
                                                                Edit <i class="fa fa-pencil-alt icon-spacing"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <!-- Include Create Sub Kriteria Modal -->
                                                    
                                                    <!-- Include Edit Sub Kriteria Modal -->
                                                
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Sub Kriteria</th>
                                                                    <th>Bobot</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>

                                <!-- Normalisasi tab content -->
                                @if ($alternatifs->count() > 0)
                    
                                <div class="tab-pane fade " id="normalisasi" role="tabpanel"
                                    aria-labelledby="normalisasi-tab">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="table-responsive mt-3">
                                                <div class="row">
                                                </div>
                                                <div class="card-header">
                                                    <h3>Hasil Analisa</h3>
                                                </div>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Alternatif</th>
                                                            @foreach ($kriteria as $krit)
                                                                <th>{{ $krit->kode }}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach($alternatifs as $index => $alt)
                                                      <tr>
                                                          <td>{{ $index + 1 }}</td>
                                                          <td>{{ $alt->pengajuan->warga->nama_kepalaKeluarga }}</td>
                                                          @php
                                                          $nilai = [];
                                                          foreach ($kriteria as $k) {
                                                              $ks = $alt->kriteria->find($k->id_kriteria);
                                                              // dd($ks);
                                                              $nilai[] = $ks ? $ks->pivot->nilai : 0;
                                                          }
                                                          @endphp
                                                          @foreach ($nilai as $n)
                                                          <td>
                                                              {{ $n }}
                                                          </td>
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
                                                                <a class="page-link" href="#" tabindex="-1"
                                                                    aria-disabled="true">Previous</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link"
                                                                    href="#">Next</a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!-- Perhitungan tab content -->
@if ($alternatifs->count() > 0)
<div class="tab-pane fade" id="perhitungan" role="tabpanel" aria-labelledby="perhitungan-tab">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Normalisasi Matriks</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach ($kriteria as $krit)
                                    <th>{{ $krit->kode }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="bg-white text-left text-sm">MAX</th>
                                @foreach ($kriteria as $krit)
                                    @php
                                        $nilai = [];
                                        foreach ($alternatifs as $alter) {
                                            $ks = $alter->kriteria->find($krit->id);
                                            $nilai[] = $ks ? $ks->pivot->nilai : 0;
                                        }
                                        $max = max($nilai);
                                    @endphp
                                    <td>{{ $max }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th class="bg-white text-left text-sm">MIN</th>
                                @foreach ($kriteria as $krit)
                                    @php
                                        $nilai = [];
                                        foreach ($alternatifs as $alter) {
                                            $ks = $alter->kriteria->find($krit->id);
                                            $nilai[] = $ks ? $ks->pivot->nilai : 0;
                                        }
                                        $min = min($nilai);
                                    @endphp
                                    <td>{{ $min }}</td>
                                @endforeach
                            </tr>
                            @forelse ($alternatifs as $index => $alt)
                            <tr>
                                <td>
                                    {{ $alt->pengajuan->warga->nama_kepalaKeluarga }}
                                </td>
                                @if (is_array($alt->Nij))
                                    @foreach ($alt->Nij as $normal)
                                        <td>
                                            {{ $normal }}
                                        </td>
                                    @endforeach
                                @else
                                    <td colspan="{{ $kriteria->count() }}">Data Nij tidak valid</td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriteria->count() + 1 }}">Belum ada data alternatif.</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Total
                                </td>
                                @foreach ($kriteria as $krit)
                                    @php
                                        $total = 0;
                                        foreach ($alternatifs as $alter) {
                                            $ks = $alter->kriteria->find($krit->id);
                                            $total += $ks ? $ks->pivot->nilai : 0;
                                        }
                                    @endphp
                                    <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        {{ $total }}
                                    </td>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

                            
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
                                                                <?php foreach ($kriteria as $krit) {?>
                                                                <th><?= $krit->kode ?></th>
                                                                <?php }?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($alternatifs as $key => $alt)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $alt->pengajuan->warga->nama_kepalaKeluarga }}</td>
                                                                    <td>
                                                                        
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            <tr>
                                                                <th colspan="2">Total</th>
                                                                @foreach ($kriteria as $krit)
                                                                    <th></th>
                                                                @endforeach
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
                                                                <?php foreach ($kriteria as $krit) {?>
                                                                <th><?= $krit->kode ?></th>
                                                                <?php }?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <?//php foreach ($kriteria as $kriteria) {?>
                                                                <td>
                                                                    <?//= number_format(array_sum(array_column($alternatif, 'nilai_kriteria')[$kriteria->id_kriteria]) / count($alternatif), 2)?>
                                                                </td>
                                                                <?php //}
                                                                ?>
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
                                                                <?php foreach ($kriteria as $krit) {?>
                                                                <th><?= $krit->kode ?></th>
                                                                <?php }?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Perankingan-->
                                <div class="tab-pane fade" id="perankingan" role="tabpanel"
                                    aria-labelledby="perankingan-tab">
                                    <div class="container mt-4">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Alternatif</th>
                                                    <?php foreach ($kriteria as $krit) {?>
                                                    <th><?= $krit->kode ?></th>
                                                    <?php }?>
                                                    <th>Score PSI</th>
                                                    <th>Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <tbody>
                                                @php $rank = 1; @endphp
                                                @foreach ($alternatifs as $alt)
                                                    <tr>
                                                        <td>{{ $rank }}</td>
                                                        <td>{{ $alt->pengajuan->warga->nama_kepalaKeluarga }}</td>
                                                        @foreach ($kriteria as $kindex => $krit)
                                                            <td>
                                                                @php
                                                                    $nilai = $alt->kriteria->find($krit->id_kriteria)->pivot->nilai ?? 'Tidak ada nilai';
                                                                @endphp
                                                                {{ $nilai }}
                                                            </td>
                                                        @endforeach
                                                        <td>{{ number_format($alt->nilai, 2) }}</td>
                                                        <td>{{ $rank++ }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.delete-btn').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus kriteria ini?")) {
                deleteCriteria(id);
            }
        });
    
        $.ajax({
    url: '/kriteria/delete/' + id,
    type: 'POST',
    data: {
        _token: '{{ csrf_token() }}',
        _method: 'DELETE'
    },
    success: function(response) {
        console.log(response);
        location.reload(); // Reload halaman setelah penghapusan berhasil
    },
    error: function(xhr) {
        console.log(xhr.responseText);
    }
});

      });
    </script>
    
    
    
      
      
@endsection
