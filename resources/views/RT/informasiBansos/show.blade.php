@extends('layouts.appRT')

@section('content')
<main class="container-fluid px-0">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><b><span style="font-family: 'Arial Black', sans-serif;">Detail Bansos</span></b></h1>
            </div>
            <div class="mb-3 text-center">
                <label for="asal_bansos" class="form-label" style="font-size: 24px;">Asal Bansos:</label>
                <br>
                <span style="font-size: 24px; background-color: #f0f0f0; padding: 3px 6px; border-radius: 4px;">{{ $bansos->asal_bansos }}</span>
            </div>
            <div class="mb-3 text-center">
                <label for="jenis_bansos" class="form-label" style="font-size: 24px;">Jenis Bansos:</label>
                <br>
                <span style="font-size: 24px; background-color: #f0f0f0; padding: 3px 6px; border-radius: 4px;">{{ $bansos->jenis_bansos }}</span>
            </div>
            <div class="mb-3 text-center">
                <label for="periode" class="form-label" style="font-size: 24px;">Periode:</label>
                <br>
                <span style="font-size: 24px; background-color: #f0f0f0; padding: 3px 6px; border-radius: 4px;">{{ $bansos->periode }}</span>
            </div>
            <div class="mb-3 text-center">
                <label for="keterangan" class="form-label" style="font-size: 24px;">Keterangan:</label>
                <br>
                <span style="font-size: 24px; background-color: #f0f0f0; padding: 3px 6px; border-radius: 4px;">{{ $bansos->keterangan }}</span>
            </div>
            <div class="mb-3 text-center">
                <label for="status" class="form-label" style="font-size: 24px;">Status:</label>
                <br>
                <span style="font-size: 24px; background-color: #f0f0f0; padding: 3px 6px; border-radius: 4px;">{{ $bansos->status }}</span>
            </div>
            <a href="{{ route('petugas.bansosrt') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</main>
@endsection
