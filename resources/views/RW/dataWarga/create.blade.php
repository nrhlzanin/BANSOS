@extends('RW.layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
    <div class="col-lg-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Informasi</h1>
        </div>
        <form action="" method="POST">
            @csrf
            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
            </div>
            {{-- No. KK --}}
            <div class="mb-3">
                <label for="no_kk" class="form-label">No. KK:</label>
                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Nomor Kartu Keluarga" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </div>
            {{-- No. KTP --}}
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No. KTP:</label>
                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Nomor KTP" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </div>
            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap">
            </div>
            {{-- Tempat Tanggal Lahir --}}
            <div class="mb-3">
                <label for="tempat_tanggal_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                </div>
            </div>
            {{-- Jenis Kelamin --}}
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki" value="Laki-Laki">
                    <label class="form-check-label" for="jenis_kelamin_laki">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_perempuan" value="Perempuan">
                    <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                </div>
            </div>
            {{-- Agama --}}
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select class="form-select" name="agama" id="agama">
                    <option selected disabled>Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            {{-- No Telepon --}}
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon:</label>
                <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
