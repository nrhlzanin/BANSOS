@extends('RW.layouts.main')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b>Halaman Penambahan Bantuan Sosial</b></h1>
            </div>
            <form action="{{ route('admin.informasi-bansos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="asal_bansos" class="form-label">Asal Bansos:</label>
                    <input type="text" name="asal_bansos" id="asal_bansos" class="form-control" style="width: 300px;" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_bansos" class="form-label">Jenis Bansos:</label>
                    <input type="text" name="jenis_bansos" id="jenis_bansos" class="form-control" style="width: 300px;" required>
                </div>
                <div class="mb-3">
                    <label for="periode" class="form-label">Periode:</label>
                    <input type="date" name="periode" id="periode" class="form-control" style="width: 300px;" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" style="width: 300px;" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-control" style="width: 300px;" required>
                        <option value="tersalurkan">Tersalurkan</option>
                        <option value="aktif">Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>
@endsection
