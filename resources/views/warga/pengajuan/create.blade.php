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

    <form action="{{ route('warga.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label" style="margin: 5px">Nama:</label>
                        <input type="text" class="form-control form-control-lg" name="nama_kepalaKeluarga" id="nama" placeholder="Nama Lengkap" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" value="{{ $warga->nama_kepalaKeluarga }}">
                        <small id="nama_warning" style="color: red; display: none; margin: 5px;">Hanya huruf dan simbol yang diperbolehkan.</small>
                    </div>

                    <!-- No. KK -->
                    <div class="mb-3">
                        <label for="no_kk" class="form-label" style="margin: 5px">No. KK:</label>
                        <input type="text" class="form-control form-control-lg" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" value="{{ $warga->no_kk }}">
                        <small id="no_kk_warning" style="color: red; display: none; margin: 5px;">Hanya angka yang diperbolehkan.</small>
                    </div>

                    <!-- Foto KK -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Foto KK:</label>
                        <input type="file" class="form-control-file" id="foto_ktp" name="foto_kk" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(event, 'preview')">
                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                        <small class="form-text text-muted" style="margin: 5px;">Format gambar yang diterima: JPG, PNG, GIF. Ukuran maksimum file: 5MB.</small>
                        @error('foto_kk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- No Telepon -->
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label" style="margin: 5px; margin-top: 9px;">No Telepon:</label>
                        <input type="text" class="form-control form-control-lg" name="no_telp" id="no_telepon" placeholder="ex: 089123745184" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" value="{{ $warga->no_telp }}">
                        <small id="no_telepon_warning" style="color: red; display: none; margin: 5px;">Hanya angka yang diperbolehkan.</small>
                    </div>

                </div>  
                <div class="col-md-6">
                    {{-- RT --}}
                    <div class="mb-3">
                        <label for="rt" class="form-label" style="margin: 5px">RT:</label>
                        <div class="input-group">
                            <input type="number" class="form-control form-control-lg" name="no_rt" id="rt" placeholder="Masukkan no. RT" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px" pattern="\d*" inputmode="numeric" value="{{ $warga->no_rt }}">
                        </div>
                    </div>

                    <!-- No. KTP -->
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label" style="margin: 5px">No. KTP:</label>
                        <input type="text" class="form-control form-control-lg" name="no_ktp" id="no_ktp" placeholder="NIK" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" value="{{ $warga->no_nik }}">
                        <small id="no_ktp_warning" style="color: red; display: none; margin: 5px;">Hanya angka yang diperbolehkan.</small>
                    </div>

                    <!-- Foto KTP -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Foto KTP:</label>
                        <input type="file" class="form-control-file" id="foto_ktp" name="foto_ktp" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(event, 'preview_foto_ktp')">
                        <img id="preview_foto_ktp" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                        <small class="form-text text-muted" style="margin: 5px;">Format gambar yang diterima: JPG, PNG, GIF. Ukuran maksimum file: 5MB.</small>
                        @error('foto_ktp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label" style="margin: 5px">Email:</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="example@gmail.com" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" required value="{{ auth()->user()->email }}">
                        <small id="email_warning" style="color: red; display: none; margin: 5px;">Email tidak valid.</small>
                    </div>

                </div>
            </div>

            <hr>
            <h2 class="h2" style="margin-top: 25px; margin-bottom:25px">Lengkapi Data Kriteria Di Bawah Ini</h2>
            {{-- KRITERIA --}}

            <div class="row">
                <div class="col-md-6">
                    {{-- Pekerjaan --}}
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label" style="margin: 5px">Status Pekerjaan:</label>
                            <div class="input-group">
                                <select class="form-select" name="pekerjaan" id="pekerjaan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Status Pekerjaan</option>
                                    <option value="Bekerja">Bekerja</option>
                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                </select>
                            </div>
                       
                        @error('pekerjaan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Jumlah Tanggungan --}}
                    <div class="mb-3">
                        <label for="tanggungan" class="form-label" style="margin: 5px">Jumlah Tanggungan:</label>
                            <div class="input-group">
                                <select class="form-select" name="jumlah_tanggungan" id="tanggungan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Jumlah Tanggungan</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">> 5</option>
                                </select>
                            </div>
                            @error('jumlah_tanggungan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Tempat Tinggal --}}
                    <div class="mb-3">
                        <label for="tempat_tinggal" class="form-label" style="margin: 5px">Status Tempat Tinggal:</label>
                            <div class="input-group">
                                <select class="form-select" name="tempat_tinggal" id="tempat_tinggal" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Status Tempat Tinggal</option>
                                    <option value="Menumpang">Menumpang</option>
                                    <option value="Kontrakan">Kontrakan</option>
                                    <option value="Rumah Pribadi">Rumah Pribadi</option>
                                </select>
                            </div>
                            @error('tempat_tinggal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Sumber Air Bersih --}}
                    <div class="mb-3">
                        <label for="air" class="form-label" style="margin: 5px">Sumber Air Bersih:</label>
                            <div class="input-group">
                                <select class="form-select" name="sumber_air_bersih" id="sumber_air_bersih" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Sumber Air Bersih</option>
                                    <option value="Sumur Swadaya">Sumur Swadaya</option>
                                    <option value="Sumur Tetangga">Sumur Tetangga</option>
                                    <option value="Sumur Pribadi">Sumur Pribadi</option>
                                    <option value="PDAM Terbatas">PDAM Terbatas</option>
                                    <option value="PDAM Bebas">PDAM Bebas</option>
                                </select>
                            </div>
                            @error('sumber_air_bersih')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Kelistrikan --}}
                    <div class="mb-3">
                        <label for="listrik" class="form-label" style="margin: 5px">Kelistrikan:</label>
                            <div class="input-group">
                                <select class="form-select" name="kelistrikan" id="listrik" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Besaran Listrik</option>
                                    <option value="Menumpang">Menumpang</option>
                                    <option value="Pribadi 450watt">Pribadi 450 Watt</option>
                                    <option value="Pribadi 900watt">Pribadi 900 Watt</option>
                                    <option value="Pribadi 1200watt">Pribadi 1200 Watt</option>
                                    <option value="Pribadi >1200watt">Pribadi > 1200 Watt</option>
                                </select>
                            </div>
                            @error('kelistrikan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Transportasi --}}
                    <div class="mb-3">
                        <label for="transportasi" class="form-label" style="margin: 5px">Transportasi:</label>
                            <div class="input-group">
                                <select class="form-select" name="transportasi" id="transportasi" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Transportasi</option>
                                    <option value="Jalan Kaki dan/ Sepeda">Jalan Kaki dan/Sepeda</option>
                                    <option value="Transportasi Umum">Transportasi Umum</option>
                                    <option value="1 Kendaraan Bermotor">1 Kendaraan Bermotor</option>
                                    <option value="2 Kendaraan Bermotor">2 Kendaraan Bermotor</option>
                                    <option value=">2 Kendaraan Bermotor">>2 Kendaraan Bermotor</option>
                                </select>
                            </div>
                            @error('transportasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Slip Gaji:</label>
                        <input type="file" class="form-control-file" id="foto_slipgaji" name="foto_slipgaji" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(event, 'preview_slip_gaji')">
                        <img id="preview_slip_gaji" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                        <small class="form-text text-muted" style="margin: 5px;">Format gambar yang diterima: JPG, PNG, GIF. Ukuran maksimum file: 5MB.</small>
                        @error('foto_slipgaji')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>                       
  
                </div>
                <div class="col-md-6">
                    {{-- Penghasilan --}}
                    <div class="mb-3">
                        <label for="penghasilan" class="form-label" style="margin: 5px">Penghasilan Per Bulan:</label>
                            <div>
                                <select class="form-select" name="penghasilan" id="penghasilan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Penghasilan Per Bulan</option>
                                    <option value="<=500.000"> <=500.000</option>
                                    <option value=">500.000 sampai <=1.000.000"> >500.000 sampai <=1.000.000</option>
                                    <option value=">1.000.000 sampai <=1.500.000"> >1.000.000 sampai <=1.500.000</option>
                                    <option value=">1.500.000 sampai <=2.000.000"> >1.500.000 sampai <=2.000.000</option>
                                    <option value=">2.000.000"> >2.000.000</option>
                                </select>
                            </div>
                            @error('penghasilan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Status Pendidikan Terakhir --}}
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label" style="margin: 5px">Pendidikan Terakhir:</label>
                            <div>
                                <select class="form-select" name="pendidikan" id="pendidikan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Pendidikan Terakhir</option>
                                    <option value="Tidak Sekolah"> Tidak Sekolah</option>
                                    <option value="SD"> SD</option>
                                    <option value="SMP"> SMP</option>
                                    <option value="SMA"> SMA</option>
                                    <option value="Kuliah"> Kuliah</option>
                                </select>
                            </div>
                            @error('pendidikan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Jenis Dinding --}}
                    <div class="mb-3">
                        <label for="dinding" class="form-label" style="margin: 5px">Jenis Dinding yang Digunakan:</label>
                            <div>
                                <select class="form-select" name="jenis_dinding" id="jenis_dinding" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Jenis Dinding</option>
                                    <option value="Tembok"> Tembok</option>
                                    <option value="Papan Kayu"> Kayu/Papan</option>
                                    <option value="Anyaman Bambu"> Anyaman Bambu</option>
                                    <option value="Triplek"> Triplek</option>
                                    <option value="Batu Bata"> Batu Bata</option>
                                    <option value="Batako"> Batako</option>
                                </select>
                            </div>
                            @error('jenis_dinding')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Jenis Atap --}}
                    <div class="mb-3">
                        <label for="atap" class="form-label" style="margin: 5px">Jenis Atap yang Digunakan:</label>
                            <div>
                                <select class="form-select" name="jenis_atap" id="jenis_atap" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                    <option selected disabled>Pilih Jenis Atap</option>
                                    <option value="Genteng Tanah Liat"> Genteng Tanah Liat</option>
                                    <option value="Genteng Metal"> Genteng Metal</option>
                                    <option value="Asbes"> Asbes</option>
                                    <option value="Seng"> Seng</option>
                                    <option value="Bambu"> Bambu</option>
                                    <option value="Jerami"> Jerami</option>
                                </select>
                            </div>
                            @error('jenis_atap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    {{-- Luas Bangunan --}}
                    <div class="mb-3">
                        <label for="luas_bangunan" class="form-label" style="margin: 5px">Luas Bangunan (m²):</label>
                        <div>
                            <select class="form-select" name="luas_bangunan" id="luas_bangunan" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
                                <option selected disabled>Pilih Luas Bangunan</option>
                                <option value="0-50 m2"> 0-50 m²</option>
                                <option value=">50-100m2"> >50-100 m²</option>
                                <option value=">100-150m2"> >100-150 m²</option>
                                <option value=">150-200m2"> >150-200 m²</option>
                                <option value=">200m2"> >200 m²</option>
                            </select>
                        </div>
                        @error('luas_bangunan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary center-btn" style="margin-top:150px; margin-bottom: 20px ">Submit</button>
        </form>
</div>
    </header>
</main>

@endsection

@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('js')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var centerButton = document.querySelector(".center-btn");
            centerButton.style.display = "block";
            centerButton.style.margin = "auto";
        });

        // Contoh animasi saat tombol disubmit
        // document.getElementById("myForm").addEventListener("submit", function(event) {
        //     event.preventDefault(); // Untuk mencegah form dikirim secara default
            
        //     // Tambahkan animasi di sini
        //     var centerButton = document.querySelector(".center-btn");
        //     centerButton.style.opacity = "0";
        //     setTimeout(function() {
        //         alert("Form berhasil disubmit!");
        //     }, 500); // Menunggu 0.5 detik sebelum menampilkan alert
        // });
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
        function previewImage(event, target) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById(target);
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        document.getElementById('pekerjaan').addEventListener('change', function() {
            var pekerjaanValue = this.value;
            var jobInput = document.getElementById('job');

            if (pekerjaanValue === '1') {
                jobInput.removeAttribute('disabled');
            } else {
                jobInput.setAttribute('disabled', 'disabled');
                jobInput.value = ''; // Clear the input field if disabled
            }
        });
    </script>
@endpush
