@extends('layouts.landing', ['hideFooter' => true])

@section('title', 'Status Pengajuan')

@section('content')
<main class="container" style="margin: 100px auto;">
    <header class="animate__animated animate__fadeIn">
        <h1>Status Saya</h1>
    </header>
    <div class="mt-4">
        @if($pengajuan->isEmpty())
            <p>No pengajuan data found.</p>
        @else
            @foreach ($pengajuan as $item)
            <div class="card mb-4">
                <div class="card-header" style="font-size: 20px;"> <!-- Atur ukuran teks di sini -->
                    Status Pengajuan Bantuan Sosial 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Tanggal Pengajuan:</strong> <span style="font-size: 18px;">{{ $item->created_at }}</span></p>
                            <p><strong>Nama:</strong> <span style="font-size: 18px;">{{ $user->warga->nama_kepalaKeluarga }}</span></p>
                            <p><strong>Status Data:</strong> <span class="text-info" style="font-size: 18px;">{{ $item->status_data }}</span></p>
                            <p><strong>Status Pengajuan:</strong> <span class="text-info" style="font-size: 18px;">{{ $item->status_pengajuan }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</main>
@endsection


@section('custom_css')
<style>
    .my-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
        font-size: 24px; /* Atur ukuran font sesuai kebutuhan */
    }
    header h1 {
        text-align: center;
        margin-bottom: 50px;
        font-size: 36px; /* Atur ukuran font sesuai kebutuhan */
    }
</style>
@endsection
