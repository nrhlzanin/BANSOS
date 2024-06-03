@extends('RW.layouts.main')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b>Halaman Pengajuan</b></h1>
            </div>
            <form action="" method="POST">
                <h3 class="h3" style="margin-top: 25px; margin-bottom:25px">Lengkapi Data Diri Di Bawah Ini!</h3>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label" style="margin: 5px">Nama:</label>
                            <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Nama Lengkap" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- No. KTP --}}
                        <div class="mb-3">
                            <label for="no_ktp" class="form-label" style="margin: 5px">No. KTP:</label>
                            <input type="text" class="form-control form-control-lg" name="no_ktp" id="no_ktp" placeholder="Nomor KTP" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Tempat Tanggal Lahir --}}
                        <div class="mb-3">
                            <label for="tempat_tanggal_lahir" class="form-label" style="margin: 5px">Tempat Tanggal Lahir:</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" style="border-radius: 5px; font-size: 16px; padding: 10px; margin-right: 10px; margin-top: 5px;">
                                <input type="date" class="form-control form-control-lg" name="tanggal_lahir" id="tanggal_lahir" style="border-radius: 5px; font-size: 16px; padding: 10px; margin-left: 10px; margin-top: 5px;">
                            </div>
                        </div>
                        {{-- Agama --}}
                        <div class="mb-3">
                            <label for="agama" class="form-label" style="margin: 5px">Agama:</label>
                            <div>
                                <select class="form-select form-control-lg" name="agama" id="agama" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        {{-- Jenis Kelamin --}}
                        <div class="mb-3">
                            <label class="form-label" style="margin: 5px">Jenis Kelamin:</label><br>
                            <div class="form-check form-check-inline" style="margin-left: 5px; margin-top: 15px">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki" value="Laki-Laki">
                                <label class="form-check-label" for="jenis_kelamin_laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin: 5px; margin-top: 15px">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="Perempuan">
                                <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                            </div>
                        </div>
                        {{-- No Telepon --}}
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label" style="margin: 5px; margin-top: 9px;">No Telepon:</label>
                            <input type="text" class="form-control form-control-lg" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label" style="margin: 5px">Email:</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Alamat Email" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" required>
                        </div>

                    </div>  
                    <div class="col-md-6">
                        {{-- No. KK --}}
                        <div class="mb-3">
                            <label for="no_kk" class="form-label" style="margin: 5px">No. KK:</label>
                            <input type="text" class="form-control form-control-lg" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Provinsi --}}
                        <div class="mb-3">
                            <label for="provinsi" class="form-label" style="margin: 5px">Provinsi:</label>
                            <input type="text" class="form-control form-control-lg" name="provinsi" id="provinsi" placeholder="Nama Provinsi" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Kabupaten --}}
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label" style="margin: 5px">Kabupaten:</label>
                            <input type="text" class="form-control form-control-lg" name="kabupaten" id="kabupaten" placeholder="Nama Kabupaten" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Kecamatan --}}
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label" style="margin: 5px">Kecamatan:</label>
                            <input type="text" class="form-control form-control-lg" name="kecamatan" id="kecamatan" placeholder="Nama Kecamatan" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Desa --}}
                        <div class="mb-3">
                            <label for="desa" class="form-label" style="margin: 5px">Desa:</label>
                            <input type="text" class="form-control form-control-lg" name="desa" id="desa" placeholder="Nama Desa" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- RT/RW/Kode Pos --}}
                        <div class="mb-3">
                            <label for="rt_rw" class="form-label" style="margin: 5px">RT/RW/Kode Pos:</label>
                            <div class="input-group">
                                <input type="number" class="form-control form-control-lg" name="rt" id="rt" placeholder="Masukkan no. RT" style="border-radius: 5px; font-size: 16px; padding: 10px; margin-right: 10px; margin-top: 5px; margin-left: 5px;" pattern="\d*" inputmode="numeric">
                                <input type="number" class="form-control form-control-lg" name="rw" id="rw" placeholder="Masukkan no. RW" style="border-radius: 5px; font-size: 16px; padding: 10px; margin-right: 10px; margin-top: 5px; margin-left: 5px;" pattern="\d*" inputmode="numeric">
                                <input type="text" class="form-control form-control-lg" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                            </div>
                        </div>
                            
                    </div>
                </div>

                <hr>
                <h2 class="h2" style="margin-top: 25px; margin-bottom:25px">Isi Data Kriteria Di Bawah Ini dengan Sesuai Kondisi Anda</h2>
                {{-- KRITERIA --}}

                <div class="row">
                    <div class="col-md-6">
                        {{-- Status Pekerjaan --}}
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label" style="margin: 5px">Status Pekerjaan:</label>
                                <div>
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
                                <div>
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
                                <div>
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
                                <div>
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
                                <div>
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
                                <div>
                                    <select class="form-select" name="transportasi" id="transportasi" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih Besaran Listrik</option>
                                        <option value="1">Jalan Kaki dan/Sepeda</option>
                                        <option value="2">Transportasi Umum</option>
                                        <option value="3">1 Kendaraan Bermotor</option>
                                        <option value="4">2 Kendaraan Bermotor</option>
                                        <option value="5">> 2 Kendaraan Bermotor</option>
                                    </select>
                                </div>
                        </div>
                        {{-- Unggah Slip Gaji --}}
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Slip Gaji:</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" onchange="previewImage(event)">
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
                        {{-- History Penerimaan Bansos
                        <div class="mb-3">
                            <label for="history" class="form-label" style="margin: 5px">History Penerimaan Bansos:</label>
                                <div>
                                    <select class="form-select" name="history" id="history" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih History Penerimaan Bansos</option>
                                        <option value="1"> Pernah Menerima Bansos</option>
                                        <option value="2"> Belum Menerima Bansos</option>
                                    </select>
                                </div>
                        </div> --}}
                        {{-- Status Pendidikan Terakhir --}}
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label" style="margin: 5px">Pendidikan Terakhir:</label>
                                <div>
                                    <select class="form-select" name="pendidikan" id="pendidikan" style="background-color: white; f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
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
                            <input type="text" class="form-control form-control-lg" name="luas" id="luas" placeholder="Masukkan Luas Bangunan dalam m²" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
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
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top:150px; margin-bottom: 20px ">Submit</button>
            </form>
        </div>
    </div>
</main>
@endsection
