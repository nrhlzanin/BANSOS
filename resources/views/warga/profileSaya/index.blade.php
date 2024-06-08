@extends('layouts.landing', ['hideFooter' => true])

@section('title', 'Profil Saya')

@section('content')
<main class="container" style="margin: 100px auto 100px;">
    <header class="animate__animated animate__fadeIn">
        <h1>Profil Saya</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="myForm" action="{{ route('warga.pengajuan.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label" style="margin: 5px">Nama:</label>
                        <input type="text" class="form-control form-control-lg" name="nama" id="nama" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" value="{{ $warga->nama_kepalaKeluarga }}">
                    </div>

                    <!-- No. KTP -->
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label" style="margin: 5px">No. KTP:</label>
                        <input type="text" class="form-control form-control-lg" name="no_ktp" id="no_ktp" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" pattern="\d*" inputmode="numeric">
                    </div>

                    <!-- No. KK -->
                    <div class="mb-3">
                        <label for="no_kk" class="form-label" style="margin: 5px">No. KK:</label>
                        <input type="text" class="form-control form-control-lg" name="no_kk" id="no_kk" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" pattern="\d*" inputmode="numeric">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- RT -->
                    <div class="mb-3">
                        <label for="rt" class="form-label" style="margin: 5px">RT:</label>
                        <input type="number" class="form-control form-control-lg" name="rt" id="rt" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" min="1" max="10" required>
                    </div>

                    <!-- No. Telp -->
                    <div class="mb-3">
                        <label for="no_telp" class="form-label" style="margin: 5px">No. Telepon:</label>
                        <input type="text" class="form-control form-control-lg" name="no_telp" id="no_telp" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" pattern="\d*" inputmode="numeric">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label" style="margin: 5px">Email:</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="email" style="border-radius: 5px; font-size: 16px; padding: 10px; margin: 5px;" required value="{{ auth()->user()->email }}">
                    </div>
                </div>
            </div>
            <!-- Simpan -->
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary center-btn" style="margin-top: 20px; margin-bottom: 20px;">Simpan</button>
            </div>
        </form>
    </header>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mengatur posisi gulir ke atas saat halaman dimuat
        window.scrollTo(0, 0);

        var centerButton = document.querySelector(".center-btn");
        centerButton.style.display = "block";
        centerButton.style.margin = "auto";
    });

    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Untuk mencegah form dikirim secara default

        // Tambahkan animasi di sini
        var centerButton = document.querySelector(".center-btn");
        centerButton.style.opacity = "0";
        setTimeout(function() {
            alert("Form berhasil disubmit!");
            // Lanjutkan pengiriman form secara manual setelah animasi dan alert
            document.getElementById("myForm").submit();
        }, 500); // Menunggu 0.5 detik sebelum menampilkan alert
    });
</script>
@endsection
