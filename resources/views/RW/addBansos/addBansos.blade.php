@extends('RW.layouts.main')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b>Halaman Penambahan Bantuan Sosial</b></h1>
            </div>
            <form action="" method="POST">
                <h3 class="h3" style="margin-top: 25px; margin-bottom:25px">Lengkapi Data Bawah Ini!</h3>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        {{-- Jenis Bansos --}}
                        <div class="mb-3">
                            <label for="jenis" class="form-label" style="margin: 5px">Jenis Bansos:</label>
                            <div>
                                <select class="form-select form-control-lg" name="jenis" id="jenis" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
                                    <option selected disabled>Pilih Jenis Bansos</option>
                                    <option value="1">Bantuan Pangan Non Tunai (BPNT)</option>
                                    <option value="2">Program Keluarga Harapan (PKH)</option>
                                    <option value="3">Bantuan Sosial Tunai (BST)</option>
                                </select>
                            </div>
                        </div>
                        {{-- Tanggal Keluar Bansos --}}
                        <div class="mb-3">
                            <label for="tanggal_keluar" class="form-label" style="margin: 5px">Tanggal Keluar Bansos:</label>
                            <input type="date" class="form-control form-control-lg" name="tanggal_keluar" id="tanggal_keluar" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>

                    </div>  
                    <div class="col-md-6">
                        {{-- Asal Bansos --}}
                        <div class="mb-3">
                            <label for="asal" class="form-label" style="margin: 5px">Asal Bansos:</label>
                            <input type="text" class="form-control form-control-lg" name="asal" id="asal" placeholder="Asal Bansos" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;">
                        </div>
                        {{-- Status --}}
                        <div class="mb-3">
                            <label for="status" class="form-label" style="margin: 5px">Status:</label>
                            <div>
                                <select class="form-select form-control-lg" name="status" id="status" style="background-color: white; color: #333; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px; width: 570px;">
                                    <option selected disabled>Status Pembagian Bansos </option>
                                    <option value="1">Belum Selesai</option>
                                    <option value="2">Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary" style="margin-top:20px; margin-bottom: 20px ">Submit</button>
            </form>
        </div>
    </div>
</main>
@endsection
