@extends('RW.layouts.main')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b>Validasi Informasi</b></h1>
            </div>
            <form action="" method="POST">
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
                                    <select class="form-select" name="agama" id="agama" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
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

                    </div>
                    <div class="col-md-6">
                        {{-- No. KK --}}
                        <div class="mb-3">
                            <label for="no_kk" class="form-label" style="margin: 5px">No. KK:</label>
                            <input type="text" class="form-control form-control-lg" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="alamat" class="form-label" style="margin: 5px">Alamat:</label>
                            <input type="text" class="form-control form-control-lg" name="alamat" id="alamat" placeholder="Alamat Lengkap" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- No Telepon --}}
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label" style="margin: 5px">No Telepon:</label>
                            <input type="text" class="form-control form-control-lg" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
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
                    </div>
                </div>

                <hr>
                {{-- KRITERIA --}}
                <h3 class="h3" style="margin-top: 25px; margin-bottom:25px">Validasi Data Di Bawah Ini!</h3>

                <div class="row">
                    <div class="col-md-6">
                        {{-- Status Pekerjaan --}}
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label" style="margin: 5px;">Status Pekerjaan:</label>
                                <div>
                                    <select class="form-select" name="pekerjaan" id="pekerjaan" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih Status Pekerjaan</option>
                                        <option value="1">Bekerja</option>
                                        <option value="2">Tidak Bekerja</option>
                                    </select>
                                    {{-- Validasi --}}
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="form-label" style="margin-right: 20px; margin-left: 5px; margin-top: 7px; color: #127C56;">Status Validasi:</label>
                                            <div class="form-check form-check-inline" style="margin-right: 10px;">
                                                <input class="form-check-input" type="radio" name="status_validasi_1" id="data_valid" value="Data Valid">
                                                <label class="form-check-label" for="data_valid">Data Valid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_validasi_1" id="data_tidak_valid" value="Data Tidak Valid">
                                                <label class="form-check-label" for="data_tidak_valid">Data Tidak Valid</label>
                                            </div>
                                    </div>
                                </div>
                                <hr>
                        </div>
                        {{-- Jumlah Tanggungan --}}
                        <div class="mb-3">
                            <label for="tanggungan" class="form-label" style="margin: 5px">Jumlah Tanggungan:</label>
                                <div>
                                    <select class="form-select" name="tanggungan" id="tanggungan" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih Jumlah Tanggungan</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                    {{-- Validasi --}}
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="form-label" style="margin-right: 20px; margin-left: 5px; margin-top: 7px; color: #127C56;">Status Validasi:</label>
                                            <div class="form-check form-check-inline" style="margin-right: 10px;">
                                                <input class="form-check-input" type="radio" name="status_validasi_2" id="data_valid" value="Data Valid">
                                                <label class="form-check-label" for="data_valid">Data Valid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_validasi_2" id="data_tidak_valid" value="Data Tidak Valid">
                                                <label class="form-check-label" for="data_tidak_valid">Data Tidak Valid</label>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        {{-- Tempat Tinggal --}}
                        <div class="mb-3">
                            <label for="tempat_tinggal" class="form-label" style="margin: 5px">Status Tempat Tinggal:</label>
                                <div>
                                    <select class="form-select" name="tempat_tinggal" id="tempat_tinggal" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih Status Tempat Tinggal</option>
                                        <option value="1">Menumpang</option>
                                        <option value="2">Kontrakan</option>
                                        <option value="3">Rumah Sendiri</option>
                                    </select>
                                    {{-- Validasi --}}
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="form-label" style="margin-right: 20px; margin-left: 5px; margin-top: 7px; color: #127C56;">Status Validasi:</label>
                                            <div class="form-check form-check-inline" style="margin-right: 10px;">
                                                <input class="form-check-input" type="radio" name="status_validasi_3" id="data_valid" value="Data Valid">
                                                <label class="form-check-label" for="data_valid">Data Valid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_validasi_3" id="data_tidak_valid" value="Data Tidak Valid">
                                                <label class="form-check-label" for="data_tidak_valid">Data Tidak Valid</label>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        {{-- Penghasilan --}}
                        <div class="mb-3">
                            <label for="penghasilan" class="form-label" style="margin: 5px">Penghasilan Per Bulan:</label>
                                <div>
                                    <select class="form-select" name="Penghasilan" id="Penghasilan" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih Penghasilan Per Bulan</option>
                                        <option value="1">< 500.000</option>
                                        <option value="2">> 500.000 sampai < 1.000.000</option>
                                        <option value="3">> 1.000.000 sampai < 1.500.000</option>
                                        <option value="4">> 1.500.000 sampai < 2.000.000</option>
                                        <option value="5">> 2.000.000</option>
                                    </select>
                                    {{-- Validasi --}}
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="form-label" style="margin-right: 20px; margin-left: 5px; margin-top: 7px; color: #127C56;">Status Validasi:</label>
                                            <div class="form-check form-check-inline" style="margin-right: 10px;">
                                                <input class="form-check-input" type="radio" name="status_validasi_4" id="data_valid" value="Data Valid">
                                                <label class="form-check-label" for="data_valid">Data Valid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_validasi_4" id="data_tidak_valid" value="Data Tidak Valid">
                                                <label class="form-check-label" for="data_tidak_valid">Data Tidak Valid</label>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        {{-- History Penerimaan Bansos --}}
                        <div class="mb-3">
                            <label for="history" class="form-label" style="margin: 5px">History Penerimaan Bansos:</label>
                                <div>
                                    <select class="form-select" name="history" id="history" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih History Penerimaan Bansos</option>
                                        <option value="1"> Pernah Menerima Bansos</option>
                                        <option value="2"> Belum Menerima Bansos</option>
                                    </select>
                                    {{-- Validasi --}}
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="form-label" style="margin-right: 20px; margin-left: 5px; margin-top: 7px; color: #127C56;">Status Validasi:</label>
                                            <div class="form-check form-check-inline" style="margin-right: 10px;">
                                                <input class="form-check-input" type="radio" name="status_validasi_5" id="data_valid" value="Data Valid">
                                                <label class="form-check-label" for="data_valid">Data Valid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_validasi_5" id="data_tidak_valid" value="Data Tidak Valid">
                                                <label class="form-check-label" for="data_tidak_valid">Data Tidak Valid</label>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        {{-- Status Pendidikan Terakhir --}}
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label" style="margin: 5px">Pendidikan Terakhir:</label>
                                <div>
                                    <select class="form-select" name="pendidikan" id="pendidikan" style="background-color: #f0f0f0; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px">
                                        <option selected disabled>Pilih Pendidikan Terakhir</option>
                                        <option value="1"> Tidak Sekolah</option>
                                        <option value="2"> SD</option>
                                        <option value="3"> SMP</option>
                                        <option value="4"> SMA</option>
                                        <option value="5"> Kuliah</option>
                                    </select>
                                    {{-- Validasi --}}
                                    <div class="mb-3 d-flex align-items-center">
                                        <label class="form-label" style="margin-right: 20px; margin-left: 5px; margin-top: 7px; color: #127C56;">Status Validasi:</label>
                                            <div class="form-check form-check-inline" style="margin-right: 10px;">
                                                <input class="form-check-input" type="radio" name="status_validasi_6" id="data_valid" value="Data Valid">
                                                <label class="form-check-label" for="data_valid">Data Valid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_validasi_6" id="data_tidak_valid" value="Data Tidak Valid">
                                                <label class="form-check-label" for="data_tidak_valid">Data Tidak Valid</label>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top:150px; margin-bottom: 20px ">Submit</button>
            </form>
        </div>
    </div>
</main>
@endsection
