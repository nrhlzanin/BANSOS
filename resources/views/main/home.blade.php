@extends('layouts.main')

@section('content')
    <main style="margin: 55px auto 100px;">

<section class="jumbotron">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-inner">
        <div class="asset('img/hero4.webp" style="display: flex;">
            <div style="flex: 1; padding-right: 20px;">
                <div class="carousel-caption d-md-block text-end" style="color: black; position: unset">
                    <h5 class="fs-1 welcome" style="line-height: 60px">Tingkatkan Integritas dan Transparansi Setiap Bantuan Sosial</h5>
                    <p class="welcome-body" style="font-size: 20px;">SI BANSOS adalah</p>
                    <p>Sistem Informasi Bantuan Sosial RW 03 Kelurahan Tulusrejo dirancang untuk membantu pendataan, penyaluran, dan pelaporan bansos di wilayah RW 03. Sistem ini diharapkan dapat meningkatkan efisiensi, transparansi, dan akuntabilitas penyaluran bansos. Sistem ini akan meliputi pendataan penerima bansos, pelaporan, dan validasi data, penyaluran bansos, serta informasi akun.
                    
                    Sistem ini dilatarbelakangi oleh permasalahan pendataan, penyaluran, dan monitoring bansos yang masih dilakukan secara manual dan menyebabkan berbagai permasalahan. Diharapkan sistem ini dapat mengatasi permasalahan tersebut dan meningkatkan kualitas penyaluran bansos di wilayah RW 03.</p>
                </div>
            </div>
            <div style="flex: 1;">
                <img src="http://127.0.0.1:8000/img/hero4.webp" class="d-block w-100" style="object-fit: cover;" alt="..." height="500">
            </div>
        </div>
        
        
                        </div>
                </div>
</section>


<section class="container py-5" id="fitur" style="padding-top: 110px !important">
<h1 class="text-center">JENIS PROGRAM BANTUAN SOSIAL</h1>
<p class="text-center" style="font-size: 30px">Berikut Jenis Program Bantuan Sosial:</p>
<div class="row mt-5 p-3 feature">
    <div class="text-center shadow rounded" style="background-color: #D6E6F2;">
        <img src="http://127.0.0.1:8000/img/laporkan.jpg" alt="" style="float: right; width: 200px; margin-left: 20px; margin-top: 10px; margin-right: 10px;">
        <h4 style="text-align: middle; margin-left: 20px; margin-bottom: 40px;margin-top: 10px; font-size: 22px;">Bantuan Pangan Non Tunai (BPNT)</h4>
        <p>Bantuan Pangan Non Tunai (BPNT) adalah program pemerintah Indonesia yang memberikan bantuan sosial pangan kepada masyarakat kurang mampu 
        dalam bentuk uang elektronik atau Kartu Sembako.</p>
            <a href="https://katadata.co.id/ekonopedia/istilah-ekonomi/65839f989c180/bantuan-pangan-non-tunai-definisi-dasar-hukum-dan-cara-mengeceknya" target="_blank" style="margin-bottom: 10px;">Info Lebih Lanjut </a>
    </div>
    <div class="text-center shadow rounded" style="background-color: #D6E6F2;">
        <img src="http://127.0.0.1:8000/img/laporkan.jpg" alt="" style="float: right; width: 200px; margin-left: 20px; margin-top: 10px;  margin-right: 10px;">
        <h4 style="text-align: middle; margin-left: 20px; margin-bottom: 40px; margin-top: 10px; font-size: 22px;">Program Keluarga Harapan (PKH)</h4>
        <p>Program Keluarga Harapan (PKH) merupakan program pemberian bantuan sosial bersyarat kepada keluarga miskin yang ditetapkan 
        sebagai Keluarga Penerima Manfaat (KPM) PKH.</p>
            <a href="https://kemensos.go.id/program-keluarga-harapan-pkh" target="_blank" style="margin-bottom: 10px;">Info Lebih Lanjut </a>
    </div>
    <div class="text-center shadow rounded" style="background-color: #D6E6F2;">
        <img src="http://127.0.0.1:8000/img/laporkan.jpg" alt="" style="float: right; width: 200px; margin-left: 20px; margin-top: 10px;  margin-right: 10px;">
        <h4 style="text-align: middle; margin-left: 20px; margin-bottom: 40px; margin-top: 10px; font-size: 22px;">Bantuan Sosial Tunai (BST)</h4>
        <p>Bantuan Sosial Tunai (BST) adalah program bantuan sosial yang diberikan oleh pemerintah Indonesia kepada keluarga miskin dan rentan miskin yang terdampak 
        pandemi COVID-19.</p>
            <a href="https://lifepal.co.id/media/bantuan-sosial-tunai/" target="_blank" style="margin-bottom: 10px;">Info Lebih Lanjut </a>
    </div>
</div>
</section>


<section class="container" id="informasi" style="padding-top: 110px !important">
<h1 class="text-center">Bantuan Sosial Terbaru</h1>
<p class="text-center col-lg-8 m-auto">Dapatkan seputar informasi bantuan sosial terkini untuk memastikan
    tingkat
    transparansi dan integritas dengan memantau setiap proses penyaluran bantuan sosial</p>
                <p class="text-muted text-center mt-5" style="font-style: italic;">Informasi bantuan belum ada!</p>
        </section>


<section class="container shadow" id="tentang" style="padding: 100px 100px 50px; !important; margin-top: 100px !important">
<h1 class="text-center">Pertanyaan dan Saran</h1>
<p class="text-center">Hubungi kami jika anda memiliki pertanyaan dan masukan</p>
<form method="" class="mt-5">
    <div class="d-flex mb-3">
        <input type="text" class="form-control me-2" id="nama" placeholder="Nama">
        <input type="email" class="form-control ms-2" id="email" placeholder="Email">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="subjek" placeholder="Subjek">
    </div>
    <div class="mb-3">
        <textarea class="form-control" id="floatingTextarea2" placeholder="Message" style="height: 100px"></textarea>
    </div>
    <button type="submit" class="btn btn-primary col-12">Kirim</button>
</form>
</section>
</main>
    
@endsection