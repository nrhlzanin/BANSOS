@extends('layouts.landing')

@section('title', 'Form Pengajuan Bantuan Sosial')

@section('content')
<main class="container" style="margin: 100px auto 100px;">
    <header class="animate__animated animate__fadeInBottomLeft">
    <h1>Form Pengajuan Bantuan Sosial</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('warga.pengajuan.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label" style="margin: 5px">Nama:</label>
                        <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Nama Lengkap" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        <small id="nama_warning" style="color: red; display: none; margin: 5px;">Hanya huruf dan simbol yang diperbolehkan.</small>
                    </div>

                    <script>
                        document.getElementById('nama').addEventListener('input', function (e) {
                            const input = e.target;
                            const warning = document.getElementById('nama_warning');
                            const filteredValue = input.value.replace(/[^a-zA-Z\s\-_.,;'"!@#$%^&*()+=?<>{}[\]\\/]/g, '');

                            if (input.value !== filteredValue) {
                                input.value = filteredValue;
                                warning.style.display = 'block';
                            } else {
                                warning.style.display = 'none';
                            }
                        });
                    </script>

                    <!-- No. KTP -->
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label" style="margin: 5px">No. KTP:</label>
                        <input type="text" class="form-control form-control-lg" name="no_ktp" id="no_ktp" placeholder="NIK" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        <small id="no_ktp_warning" style="color: red; display: none; margin: 5px;">Hanya angka yang diperbolehkan.</small>
                    </div>

                    <script>
                        document.getElementById('no_ktp').addEventListener('input', function (e) {
                            const input = e.target;
                            const warning = document.getElementById('no_ktp_warning');
                            const filteredValue = input.value.replace(/[^0-9]/g, '');

                            if (input.value !== filteredValue) {
                                input.value = filteredValue;
                                warning.style.display = 'block';
                            } else {
                                warning.style.display = 'none';
                            }
                        });
                    </script>

                    <!-- No Telepon -->
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label" style="margin: 5px; margin-top: 9px;">No Telepon:</label>
                        <input type="text" class="form-control form-control-lg" name="no_telepon" id="no_telepon" placeholder="ex: 089123745184" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        <small id="no_telepon_warning" style="color: red; display: none; margin: 5px;">Hanya angka yang diperbolehkan.</small>
                    </div>

                    <script>
                        document.getElementById('no_telepon').addEventListener('input', function (e) {
                            const input = e.target;
                            const warning = document.getElementById('no_telepon_warning');
                            const filteredValue = input.value.replace(/[^0-9]/g, '');

                            if (input.value !== filteredValue) {
                                input.value = filteredValue;
                                warning.style.display = 'block';
                            } else {
                                warning.style.display = 'none';
                            }
                        });
                    </script>
                </div>  
                <div class="col-md-6">
                    <!-- No. KK -->
                    <div class="mb-3">
                        <label for="no_kk" class="form-label" style="margin: 5px">No. KK:</label>
                        <input type="text" class="form-control form-control-lg" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        <small id="no_kk_warning" style="color: red; display: none; margin: 5px;">Hanya angka yang diperbolehkan.</small>
                    </div>

                    <script>
                        document.getElementById('no_kk').addEventListener('input', function (e) {
                            const input = e.target;
                            const warning = document.getElementById('no_kk_warning');
                            const filteredValue = input.value.replace(/[^0-9]/g, '');

                            if (input.value !== filteredValue) {
                                input.value = filteredValue;
                                warning.style.display = 'block';
                            } else {
                                warning.style.display = 'none';
                            }
                        });
                    </script>

                    {{-- RT/RW/Kode Pos --}}
                    <div class="mb-3">
                        <label for="rt" class="form-label" style="margin: 5px">RT:</label>
                        <div class="input-group">
                            <input type="number" class="form-control form-control-lg" name="rt" id="rt" placeholder="Masukkan no. RT" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px" pattern="\d*" inputmode="numeric">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label" style="margin: 5px">Email:</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="example@gmail.com" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" required>
                        <small id="email_warning" style="color: red; display: none; margin: 5px;">Email tidak valid.</small>
                    </div>

                    <script>
                        document.getElementById('email').addEventListener('input', function (e) {
                            const input = e.target;
                            const warning = document.getElementById('email_warning');
                            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                            if (!emailPattern.test(input.value)) {
                                warning.style.display = 'block';
                            } else {
                                warning.style.display = 'none';
                            }
                        });
                    </script>
                </div>
            </div>

            <hr>
            <h2 class="h2" style="margin-top: 25px; margin-bottom:25px">Lengkapi Data Kriteria Di Bawah Ini</h2>
            {{-- KRITERIA --}}

            <div class="row">
                <div class="col-md-6">
                    {{-- Status Pekerjaan --}}
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label" style="margin: 5px">Status Pekerjaan:</label>
                            <div class="input-group">
                                <select class="form-select" name="pekerjaan" id="pekerjaan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Status Pekerjaan</option>
                                    <option value="1">Bekerja</option>
                                    <option value="2">Tidak Bekerja</option>
                                </select>
                            </div>
                    </div>
                    {{-- Jumlah Tanggungan --}}
                    <div class="mb-3">
                        <label for="tanggungan" class="form-label" style="margin: 5px">Jumlah Tanggungan:</label>
                            <div class="input-group">
                                <select class="form-select" name="tanggungan" id="tanggungan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Jumlah Tanggungan</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">> 5</option>
                                </select>
                            </div>
                    </div>
                    {{-- Tempat Tinggal --}}
                    <div class="mb-3">
                        <label for="tempat_tinggal" class="form-label" style="margin: 5px">Status Tempat Tinggal:</label>
                            <div class="input-group">
                                <select class="form-select" name="tempat_tinggal" id="tempat_tinggal" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Status Tempat Tinggal</option>
                                    <option value="1">Menumpang</option>
                                    <option value="2">Kontrakan</option>
                                    <option value="3">Rumah Sendiri</option>
                                </select>
                            </div>
                    </div>
                    {{-- Sumber Air Bersih --}}
                    <div class="mb-3">
                        <label for="air" class="form-label" style="margin: 5px">Sumber Air Bersih:</label>
                            <div class="input-group">
                                <select class="form-select" name="tempat_tinggal" id="tempat_tinggal" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Sumber Air Bersih</option>
                                    <option value="1">Sumur Swadaya</option>
                                    <option value="2">Sumur Tetangga</option>
                                    <option value="3">Sumur Pribadi</option>
                                    <option value="4">PDAM Terbatas</option>
                                    <option value="4">PDAM Bebas</option>
                                </select>
                            </div>
                    </div>
                    {{-- Kelistrikan --}}
                    <div class="mb-3">
                        <label for="listrik" class="form-label" style="margin: 5px">Kelistrikan:</label>
                            <div class="input-group">
                                <select class="form-select" name="listrik" id="listrik" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Besaran Listrik</option>
                                    <option value="1">Menumpang</option>
                                    <option value="2">Pribadi 450 Watt</option>
                                    <option value="3">Pribadi 900 Watt</option>
                                    <option value="4">Pribadi 1200 Watt</option>
                                    <option value="5">Pribadi > 1200 Watt</option>
                                </select>
                            </div>
                    </div>
                    {{-- Transportasi --}}
                    <div class="mb-3">
                        <label for="transportasi" class="form-label" style="margin: 5px">Transportasi:</label>
                            <div class="input-group">
                                <select class="form-select" name="transportasi" id="transportasi" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Transportasi</option>
                                    <option value="1">Jalan Kaki dan/Sepeda</option>
                                    <option value="2">Transportasi Umum</option>
                                    <option value="3">1 Kendaraan Bermotor</option>
                                    <option value="4">2 Kendaraan Bermotor</option>
                                    <option value="5">> 2 Kendaraan Bermotor</option>
                                </select>
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Slip Gaji:</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(event)">
                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                        <small class="form-text text-muted" style="margin: 5px;">Format gambar yang diterima: JPG, PNG, GIF. Ukuran maksimum file: 5MB.</small>
                    </div>
                    
                    <script>
                        function previewImage(event) {
                            var reader = new FileReader();
                            reader.onload = function() {
                                var preview = document.getElementById('preview');
                                preview.src = reader.result;
                                preview.style.display = 'block';
                            }
                            reader.readAsDataURL(event.target.files[0]);
                        }
                    </script>                        
  
                </div>
                <div class="col-md-6">
                    {{-- Penghasilan --}}
                    <div class="mb-3">
                        <label for="penghasilan" class="form-label" style="margin: 5px">Penghasilan Per Bulan:</label>
                            <div>
                                <select class="form-select" name="Penghasilan" id="Penghasilan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Penghasilan Per Bulan</option>
                                    <option value="1">< = 500.000</option>
                                    <option value="2">> 500.000 sampai < = 1.000.000</option>
                                    <option value="3">> 1.000.000 sampai < = 1.500.000</option>
                                    <option value="4">> 1.500.000 sampai < = 2.000.000</option>
                                    <option value="5">> 2.000.000</option>
                                </select>
                            </div>
                    </div>
                    {{-- Status Pendidikan Terakhir --}}
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label" style="margin: 5px">Pendidikan Terakhir:</label>
                            <div>
                                <select class="form-select" name="pendidikan" id="pendidikan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Pendidikan Terakhir</option>
                                    <option value="1"> Tidak Sekolah</option>
                                    <option value="2"> SD</option>
                                    <option value="3"> SMP</option>
                                    <option value="4"> SMA</option>
                                    <option value="5"> Kuliah</option>
                                </select>
                            </div>
                    </div>
                    {{-- Jenis Dinding --}}
                    <div class="mb-3">
                        <label for="dinding" class="form-label" style="margin: 5px">Jenis Dinding yang Digunakan:</label>
                            <div>
                                <select class="form-select" name="dinding" id="dinding" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Jenis Dinding</option>
                                    <option value="1"> Tembok</option>
                                    <option value="2"> Kayu/Papan</option>
                                    <option value="3"> Anyaman Bambu</option>
                                    <option value="4"> Triplek</option>
                                    <option value="5"> Batu Bata</option>
                                    <option value="6"> Batako</option>
                                    <option value="7"> Lainnya</option>
                                </select>
                            </div>
                    </div>
                    {{-- Jenis Atap --}}
                    <div class="mb-3">
                        <label for="atap" class="form-label" style="margin: 5px">Jenis Atap yang Digunakan:</label>
                            <div>
                                <select class="form-select" name="atap" id="atap" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Jenis Atap</option>
                                    <option value="1"> Genteng Tanah Liat</option>
                                    <option value="2"> Genteng Metal</option>
                                    <option value="3"> Asbes</option>
                                    <option value="4"> Seng</option>
                                    <option value="5"> Bambu</option>
                                    <option value="6"> Jerami</option>
                                    <option value="7"> Lainnya</option>
                                </select>
                            </div>
                    </div>
                    {{-- Luas Bangunan --}}
                    <div class="mb-3">
                        <label for="luas" class="form-label" style="margin: 5px">Luas Bangunan (m²):</label>
                        <input type="number" class="form-control form-control-lg" name="luas" id="luas" placeholder="Masukkan Luas Bangunan dalam m²" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
                    </div>
                    {{-- Luas Bangunan
                    <div class="mb-3">
                        <label for="luas_bangunan" class="form-label" style="margin: 5px">Luas Bangunan (m²):</label>
                        <div>
                            <select class="form-select" name="luas_bangunan" id="luas_bangunan" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
                                <option selected disabled>Pilih Luas Bangunan</option>
                                <option value="1">0-50 m²</option>
                                <option value="2">> 50-100 m²</option>
                                <option value="3">>100-150 m²</option>
                                <option value="4">>150-200 m²</option>
                                <option value="5">>200 m²</option>
                            </select>
                        </div>
                    </div> --}}
                    {{-- Aset --}}
                    <div class="mb-3">
                        <label for="aset" class="form-label" style="margin: 5px; margin-top: 15px;">Aset:</label>
                        <div style="margin-top: 5px;">
                        <div class="form-check form-check-inline" style="margin-bottom: 5px; margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aset[]" value="Rumah" id="aset_rumah">
                            <label class="form-check-label" for="aset_rumah">Rumah</label>
                        </div>
                        <div class="form-check form-check-inline" style="margin-bottom: 5px; margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aset[]" value="Tanah" id="aset_tanah">
                            <label class="form-check-label" for="aset_tanah">Tanah</label>
                        </div>
                        <div class="form-check form-check-inline" style="margin-bottom: 5px; margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aset[]" value="Kebun" id="aset_kebun">
                            <label class="form-check-label" for="aset_kebun">Kebun</label>
                        </div>
                        <div class="form-check form-check-inline" style="margin-bottom: 5px; margin-left: 10px;">
                            <input class="form-check-input" type="checkbox" name="aset[]" value="Sawah" id="aset_sawah">
                            <label class="form-check-label" for="aset_sawah">Sawah</label>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary center-btn" style="margin-top:150px; margin-bottom: 20px ">Submit</button>
        </form>
</div>
    </header>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var centerButton = document.querySelector(".center-btn");
    centerButton.style.display = "block";
    centerButton.style.margin = "auto";
});

// Contoh animasi saat tombol disubmit
document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Untuk mencegah form dikirim secara default
    
    // Tambahkan animasi di sini
    var centerButton = document.querySelector(".center-btn");
    centerButton.style.opacity = "0";
    setTimeout(function() {
        alert("Form berhasil disubmit!");
    }, 500); // Menunggu 0.5 detik sebelum menampilkan alert
});
</script>
@endsection
