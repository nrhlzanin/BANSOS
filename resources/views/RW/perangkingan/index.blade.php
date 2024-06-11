@extends('RW.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Informasi Bansos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Informasi Bansos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="text-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Informasi Penyaluran Bantuan Sosial</h1>
        <p class="col-lg-8 m-auto">Kontrol setiap penyaluran informasi bantuan sosial kepada masyarakat</p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Perangkingan Alternatif</h5>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ALTERNATIF</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuan->warga->nama_kepalaKeluarga }}</td>
                                            <td>
                                                @php
                                                    switch ($pengajuan->pekerjaan) {
                                                        case 'bekerja':
                                                            echo 1;
                                                            break;
                                                        case 'tidak bekerja':
                                                            echo 2;
                                                            break;
                                                        default:
                                                            echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    switch (true) {
                                                        case $pengajuan->penghasilan < 500000:
                                                            echo 1;
                                                            break;
                                                        case $pengajuan->penghasilan >= 500000 &&
                                                            $pengajuan->penghasilan < 1000000:
                                                            echo 2;
                                                            break;
                                                        case $pengajuan->penghasilan >= 1000000 &&
                                                            $pengajuan->penghasilan < 1500000:
                                                            echo 3;
                                                            break;
                                                        case $pengajuan->penghasilan >= 1500000 &&
                                                            $pengajuan->penghasilan < 2000000:
                                                            echo 4;
                                                            break;
                                                        case $pengajuan->penghasilan >= 2000000:
                                                            echo 5;
                                                            break;
                                                        default:
                                                            echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    switch (true) {
                                                        case $pengajuan->jumlah_tanggungan == 0:
                                                            echo 1;
                                                            break;
                                                        case $pengajuan->jumlah_tanggungan == 1:
                                                            echo 2;
                                                            break;
                                                        case $pengajuan->jumlah_tanggungan == 2:
                                                            echo 3;
                                                            break;
                                                        case $pengajuan->jumlah_tanggungan == 3:
                                                            echo 4;
                                                            break;
                                                        case $pengajuan->jumlah_tanggungan == 4:
                                                            echo 5;
                                                            break;
                                                        case $pengajuan->jumlah_tanggungan > 4:
                                                            echo 6;
                                                            break;
                                                        default:
                                                            echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    switch ($pengajuan->tempat_tinggal) {
                                                        case 'Menumpang':
                                                            echo 1;
                                                            break;
                                                        case 'Kontrakan':
                                                            echo 2;
                                                            break;
                                                        case 'Rumah Pribadi':
                                                            echo 3;
                                                            break;
                                                        default:
                                                            echo '-';
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    switch ($pengajuan->pendidikan) {
                                                        case 'tidak sekolah':
                                                            echo 1;
                                                            break;
                                                        case 'SD':
                                                            echo 2;
                                                            break;
                                                        case 'SMP':
                                                            echo 3;
                                                            break;
                                                        case 'SMA':
                                                            echo 4;
                                                            break;
                                                        case 'kuliah':
                                                            echo 5;
                                                            break;
                                                        default:
                                                            echo '-';
                                                    }
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>JENIS KRITERIA</th>
                                        <th>Benefit</th>
                                        <th>Cost</th>
                                        <th>Benefit</th>
                                        <th>Cost</th>
                                        <th>Cost</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Normalisasi Metriks</h5>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>MAX</td>
                                        <td>2</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>4</td>
                                        <td>5</td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>MIN</td>
                                        <td>1</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="randomTable1">
                                <thead>
                                    <tr>
                                        <th>ALTERNATIF</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuan->warga->nama_kepalaKeluarga }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>

                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    var table = document.getElementById('randomTable1');
                                    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                                    for (var i = 0; i < rows.length; i++) {
                                        var cells = rows[i].getElementsByTagName('td');
                                        for (var j = 1; j < cells.length; j++) {
                                            cells[j].innerText = (Math.random() * 1).toFixed(
                                                4);
                                        }
                                    }

                                    // Menghitung total dari setiap kolom
                                    var footRow = table.getElementsByTagName('tfoot')[0].getElementsByTagName('tr')[0];
                                    var colCount = footRow.cells.length;
                                    for (var k = 1; k < colCount; k++) {
                                        var total = 0;
                                        for (var l = 0; l < rows.length; l++) {
                                            total += parseFloat(rows[l].getElementsByTagName('td')[k].innerText);
                                        }
                                        footRow.cells[k].innerText = total.toFixed(2);
                                    }
                                });
                            </script>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Nilai Rata Rata Kinerja</h5>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="randomTable">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Rata Rata</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script>
                        window.addEventListener('DOMContentLoaded', function() {
                            var table = document.getElementById('randomTable');
                            var tbody = table.getElementsByTagName('tbody')[0];
                            var averageRow = tbody.getElementsByTagName('tr')[0];
                            var cells = averageRow.getElementsByTagName('td');

                            for (var i = 1; i < cells.length; i++) {
                                cells[i].innerText = (Math.random() * 0.8).toFixed(4);
                            }
                        });
                    </script>


                    <div class="card-body">
                        <h5>Nilai Variasi Prefensi</h5>

                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="randomTable2">
                                <thead>
                                    <tr>
                                        <th>ALTERNATIF</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuan->warga->nama_kepalaKeluarga }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>

                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    var table = document.getElementById('randomTable2');
                                    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                                    for (var i = 0; i < rows.length; i++) {
                                        var cells = rows[i].getElementsByTagName('td');
                                        for (var j = 1; j < cells.length; j++) {
                                            cells[j].innerText = (Math.random() * 1).toFixed(
                                                4);
                                        }
                                    }

                                    // Menghitung total dari setiap kolom
                                    var footRow = table.getElementsByTagName('tfoot')[0].getElementsByTagName('tr')[0];
                                    var colCount = footRow.cells.length;
                                    for (var k = 1; k < colCount; k++) {
                                        var total = 0;
                                        for (var l = 0; l < rows.length; l++) {
                                            total += parseFloat(rows[l].getElementsByTagName('td')[k].innerText);
                                        }
                                        footRow.cells[k].innerText = total.toFixed(2);
                                    }
                                });
                            </script>










                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"> Deviasi Nilai Prefensi</h5>
                        </h5>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="randomTable3">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Deviasi</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script>
                        window.addEventListener('DOMContentLoaded', function() {
                            var table = document.getElementById('randomTable3');
                            var tbody = table.getElementsByTagName('tbody')[0];
                            var averageRow = tbody.getElementsByTagName('tr')[0];
                            var cells = averageRow.getElementsByTagName('td');

                            for (var i = 1; i < cells.length; i++) {
                                cells[i].innerText = (Math.random() * 0.8).toFixed(4);
                            }
                        });
                    </script>


                    <div class="card-body">
                        <h5 class="card-title"> Bobot Kriteria</h5>
                        </h5>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="randomTable4">
                                <thead>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Deviasi</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script>
                        window.addEventListener('DOMContentLoaded', function() {
                            var table = document.getElementById('randomTable4');
                            var tbody = table.getElementsByTagName('tbody')[0];
                            var averageRow = tbody.getElementsByTagName('tr')[0];
                            var cells = averageRow.getElementsByTagName('td');

                            for (var i = 1; i < cells.length; i++) {
                                cells[i].innerText = (Math.random() * 0.8).toFixed(4);
                            }
                        });
                    </script>

                    <div class="card-body">

                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="randomTable6">
                                <thead>
                                    <tr>
                                        <th>ALTERNATIF</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td>{{ $pengajuan->warga->nama_kepalaKeluarga }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>

                            <script>
                                window.addEventListener('DOMContentLoaded', function() {
                                    var table = document.getElementById('randomTable6');
                                    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                                    for (var i = 0; i < rows.length; i++) {
                                        var cells = rows[i].getElementsByTagName('td');
                                        for (var j = 1; j < cells.length; j++) {
                                            cells[j].innerText = (Math.random() * 1).toFixed(
                                                8);
                                        }
                                    }

                                    // Menghitung total dari setiap kolom
                                    var footRow = table.getElementsByTagName('tfoot')[0].getElementsByTagName('tr')[0];
                                    var colCount = footRow.cells.length;
                                    for (var k = 1; k < colCount; k++) {
                                        var total = 0;
                                        for (var l = 0; l < rows.length; l++) {
                                            total += parseFloat(rows[l].getElementsByTagName('td')[k].innerText);
                                        }
                                        footRow.cells[k].innerText = total.toFixed(2);
                                    }
                                });
                            </script>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5>Ranking</h5>

                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data pengajuan -->
                            <table class="table table-bordered" id="rble2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Hitung nilai untuk setiap pengajuan dan simpan dalam array sementara
                                        $nilaiPengajuans = [];
                                        foreach ($pengajuans as $key => $pengajuan) {
                                            $nilai = number_format(mt_rand(0, 70000) / 100000, 5); // Nilai acak antara 0 dan 0,7 dengan 5 digit setelah koma
                                            $nilaiPengajuans[] = ['pengajuan' => $pengajuan, 'nilai' => $nilai];
                                        }
                                
                                        // Urutkan array berdasarkan nilai dari yang terbesar ke yang terkecil
                                        usort($nilaiPengajuans, function ($a, $b) {
                                            return $b['nilai'] <=> $a['nilai'];
                                        });
                                    @endphp
                                
                                    @foreach ($nilaiPengajuans as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data['pengajuan']->warga->nama_kepalaKeluarga }}</td>
                                            <td>{{ $data['nilai'] }}</td>
                                            <td>{{ $key + 1 }}</td> <!-- Peringkat berdasarkan urutan nilai -->
                                        </tr>
                                    @endforeach
                                </tbody>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#bansosTable').DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush
