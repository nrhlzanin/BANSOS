@extends('RW.layouts.main')

@section('content')
    <div class="container">
        <h1>Hasil Perhitungan SPK Metode PSI</h1>
        
        <h2>1. Matriks Keputusan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    @foreach($matrixKeputusan as $item)
                    <th>{{ $item->nama_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($matrixKeputusan as $item)
                    <tr>
                        <td>{{ $item->id_pengajuan }}</td>
                        @foreach($item->nilai as $nilai)
                            <td>{{ $nilai }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>2. Normalisasi Matriks Keputusan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>ID Kriteria</th>
                    <th>Nilai Normalisasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matrixKeputusan as $item)
                    <tr>
                        <td>{{ $item->id_pengajuan }}</td>
                        <td>{{ $item->id_kriteria }}</td>
                        <td>{{ $item->nilai_normalisasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>3. Nilai Rata-Rata</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Kriteria</th>
                    <th>Nilai Rata-Rata</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaiRataRata as $id_kriteria => $nilai)
                    <tr>
                        <td>{{ $id_kriteria }}</td>
                        <td>{{ $nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>4. Nilai Variasi Preferensi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Kriteria</th>
                    <th>Nilai Variasi Preferensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaiVariasiPreferensi as $id_kriteria => $nilai)
                    <tr>
                        <td>{{ $id_kriteria }}</td>
                        <td>{{ $nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>5. Nilai Deviasi Nilai Preferensi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Kriteria</th>
                    <th>Nilai Deviasi Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaiDeviasiPreferensi as $id_kriteria => $nilai)
                    <tr>
                        <td>{{ $id_kriteria }}</td>
                        <td>{{ $nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>6. Bobot Kriteria</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Kriteria</th>
                    <th>Bobot Kriteria</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bobotKriteria as $id_kriteria => $bobot)
                    <tr>
                        <td>{{ $id_kriteria }}</td>
                        <td>{{ $bobot }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>7. Nilai PSI</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>Nilai PSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaiPSI as $id_pengajuan => $psi)
                    <tr>
                        <td>{{ $id_pengajuan }}</td>
                        <td>{{ $psi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>8. Perankingan Alternatif</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Pengajuan</th>
                    <th>Nilai Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rankedResults as $result)
                    <tr>
                        <td>{{ $result->id_pengajuan }}</td>
                        <td>{{ $result->nilai_total }}</td>
                        <td>{{ $result->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
