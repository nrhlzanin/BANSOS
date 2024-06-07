@extends('layouts.landing')

@section('title', 'Landing Page')

@section('content')
    <main style="margin: 55px auto 100px;">
        <!-- Beranda -->
        <section class="responsive-section">
            <div class="responsive-text">
                <h1>Tingkatkan Integritas dan Transparansi Bantuan Sosial dengan "SI BANSOS"</h1>
                <p>"SI BANSOS" adalah sistem informasi bantuan sosial RW 03 Kelurahan Tulusrejo yang dirancang untuk membantu pendataan, penyaluran, dan pelaporan bansos di wilayah RW 03. Sistem ini diharapkan dapat meningkatkan efisiensi, transparansi, dan akuntabilitas penyaluran bansos. Sistem ini akan meliputi pendataan penerima bansos, pelaporan, dan validasi data, penyaluran bansos, serta informasi akun.</p>
                <p>Sistem ini dilatarbelakangi oleh permasalahan pendataan, penyaluran, dan monitoring bansos yang masih dilakukan secara manual dan menyebabkan berbagai permasalahan. Diharapkan sistem ini dapat mengatasi permasalahan tersebut dan meningkatkan kualitas penyaluran bansos di wilayah RW 03.</p>
            </div>
            <img src="http://127.0.0.1:8000/img/hero4.webp" class="responsive-image">
        </section>
        
        
        <!-- Informasi -->
        <section class="responsive-section-2" id="jenis">
            <h1 class="text-center">JENIS PROGRAM BANTUAN SOSIAL</h1>
            <div class="row mt-5 p-3 feature">
                <div class="shadow card">
                    <div class="card-header">
                        <h4>Bantuan Pangan Non Tunai (BPNT)</h4>
                        <img src="http://127.0.0.1:8000/img/laporkan.jpg" class="card-image" alt="BPNT">
                    </div>
                    <p>Bantuan Pangan Non Tunai (BPNT) adalah program pemerintah Indonesia yang memberikan bantuan sosial pangan kepada masyarakat kurang mampu dalam bentuk uang elektronik atau Kartu Sembako.</p>
                    <a href="https://katadata.co.id/ekonopedia/istilah-ekonomi/65839f989c180/bantuan-pangan-non-tunai-definisi-dasar-hukum-dan-cara-mengeceknya" target="_blank">Info Lebih Lanjut ></a>
                </div>
        
                <div class="shadow card">
                    <div class="card-header">
                        <h4>Program Keluarga Harapan (PKH)</h4>
                        <img src="http://127.0.0.1:8000/img/laporkan.jpg" class="card-image" alt="PKH">
                    </div>
                    <p>Program Keluarga Harapan (PKH) merupakan program pemberian bantuan sosial bersyarat kepada keluarga miskin yang ditetapkan sebagai Keluarga Penerima Manfaat (KPM) PKH.</p>
                    <a href="https://kemensos.go.id/program-keluarga-harapan-pkh" target="_blank">Info Lebih Lanjut ></a>
                </div>
        
                <div class="shadow card">
                    <div class="card-header">
                        <h4>Bantuan Sosial Tunai (BST)</h4>
                        <img src="http://127.0.0.1:8000/img/laporkan.jpg" class="card-image" alt="BST">
                    </div>
                    <p>Bantuan Sosial Tunai (BST) adalah program bantuan sosial yang diberikan oleh pemerintah Indonesia kepada keluarga miskin dan rentan miskin yang terdampak pandemi COVID-19.</p>
                    <a href="https://lifepal.co.id/media/bantuan-sosial-tunai/" target="_blank">Info Lebih Lanjut ></a>
                </div>
            </div>
        </section>
        

        <!-- Pengumuman -->
        <section class="responsive-section2" id="informasi" style="">
            <div class="container">
                <h1 class="text-center">Bantuan Sosial Terbaru</h1>
                <p class="text-center col-lg-8 m-auto">Dapatkan seputar informasi bantuan sosial terkini untuk memastikan tingkat transparansi dan integritas dengan memantau setiap proses penyaluran bantuan sosial</p>
        
                <div class="mt-5 p-3 feature">
                    <div class="text-center shadow card2" style="background-color: white; max-width: 400px; margin: auto;">
                        <h2 style="font-size: 25px;">
                            <b>Data Kuota Bansos</b>
                        </h2>
                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                            <img src="http://127.0.0.1:8000/img/laporkan.jpg" alt="" style="">
                            <h1 style="font-size: 110px;"> {{ $count_bansos }} </h1>
                        </div>
                    </div>
        
                    <div class="text-center shadow card2" style="background-color: white; flex: 1; max-width: 400px; margin: auto;">
                        <h2 style="font-size: 25px;">
                            <b>Data Bansos Dicairkan</b>
                        </h2>
                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                            <img src="http://127.0.0.1:8000/img/laporkan.jpg" alt="" style="">
                            <h1 style="font-size: 110px;"> {{ $count_bansos }} </h1>
                        </div>
                    </div>
        
                    <div class="text-center shadow card2" style="background-color: white; max-width: 400px; margin: auto;">
                        <h2 style="font-size: 25px;">
                            <b>Peserta Pendaftaran Bansos</b>
                        </h2>
                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                            <img src="http://127.0.0.1:8000/img/laporkan.jpg" alt="" style="">
                            <h1 style="font-size: 110px;"> {{ $count_pengajuan }} </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

        <!-- FAQ -->
        <section class="container shadow" id="tentang"
            style="padding: 30px 100px 20px !important; margin-top: 20px !important">
            <h1 class="text-center">Pertanyaan dan Saran</h1>
            <p class="text-center">Hubungi kami jika anda memiliki pertanyaan dan masukan</p>
            <form method="post" action="{{ route('contact.submit') }}" class="mt-5">
                @csrf
                <div class="d-flex mb-3">
                    <input type="text" class="form-control me-2" id="nama" name="nama" placeholder="Nama">
                    <input type="email" class="form-control ms-2" id="email" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Subjek">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="floatingTextarea2" name="message" placeholder="Message" style="height: 100px"></textarea>
                </div>
                <button type="submit" class="btn btn-primary col-12">Kirim</button>
            </form>
        </section>
    </main>


<style>
 .responsive-section {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 40px;
    background-color: #DAEEE7;
    height: 100vh;
}

.responsive-section2 {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #DAEEE7;
    padding: 40px;
    height: 100vh;
}

.text-center {
    text-align: center;
}

.feature {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.card2 {
    background-color: black;
    padding: 20px;
    border-radius: 8px;
    max-width: 300px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin: auto;
}

.card2 h2 {
    font-size: 25px;
    margin: 0;
}

.card2 img {
    width: 70p%;
    height: auto;
}

.card2 h1 {
    font-size: 110px;
    margin: 0;
}

@media (max-width: 768px) {
    .responsive-section2 {
        padding: 20px;
        height: auto;
    }

    .card2 {
        max-width: 100%;
        padding: 20px
    }

    .feature {
        padding: 20px;
        gap: 10px;
    }

    .card2 h2 {
        font-size: 18px;
    }

    .card2 h1 {
        font-size: 80px;
    }
}



.card {
    display: flex;
    flex-direction: column;
    padding: 32px;
    border-radius: 12px;
}

.card2 {
    display: flex;
    flex-direction: column;
    padding: 32px;
    border-radius: 12px;
    gap: 20px;
    width: 400px;
}

@media (max-width: 100px) {
    .card {
        display: flex;
    }
}

.card-image {
    display: flex;
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

@media (max-width: 10px) {
    .card-image {
        width: 100%;
    }
}

.responsive-section-2 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 40px;
    height: 100vh;
}

.text-center {
    text-align: center;
}

.row {
    display: flex;
    flex-wrap
    gap: 20px;
}

.card {
    background-color: #D6E6F2;
    padding: 20px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.card-header {
    display: flex;
    justify-items: baseline;
    align-items: center;
    gap: 10px;
}

.card h4 {
    font-size: 22px;
    margin: 0;
}

.card-image {
    width: 90%;
    height: 90%;
}

.card p {
    font-size: 16px;
}

.card a {
    margin-top: auto;
    color: blue;
    text-decoration: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .responsive-section-2 {
        padding: 20px;
        height: auto;
    }

    .card {
        max-width: 100%;
    }

    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .card-image {
        width: 100%;
        height: auto;
    }

    .card h4 {
        font-size: 18px;
    }

    .card p {
        font-size: 14px;
    }
}


.responsive-text {
    color: black;
    width: 50%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.responsive-image {
    width: 700px;
    height: auto;
    display: flex;
}

@media (max-width: 1200px) {
    .responsive-image {
        width: 500px;
    }
}

@media (max-width: 768px) {
    .responsive-section {
        flex-direction: column-reverse;
        text-align: center;
        height: auto;
    }

    .responsive-text {
        width: 100%;
    }

    .responsive-image {
        width: 100%;
        max-width: 400px;
    }
}

@media (max-width: 480px) {
    .responsive-image {
        width: 100%;
        max-width: 300px;
    }

    .responsive-text h1 {
        font-size: 32px;
        line-height: 40px;
    }

    .responsive-text p {
        font-size: 16px;
    }
}
</style>

@endsection
