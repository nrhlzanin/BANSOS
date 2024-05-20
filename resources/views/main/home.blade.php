@extends('layouts.main')

@section('content')
    <main style="margin: 55px auto 100px;">
        {{-- jumbotron --}}
        <section class="jumbotron">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    @if (count($informasi))
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        @if (count($informasi) > 1)
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        @endif
                    @endif
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/hero4.webp') }}" class="d-block w-100"
                            style="filter: brightness(70%); -webkit-filter: brightness(70%); object-fit: cover;"
                            alt="..." height="500">
                        <div class="carousel-caption d-md-block">
                            <h5 class="fs-1 welcome" style="line-height: 60px">Tingkatkan Integritas dan
                                Transparansi Setiap
                                Bantuan Sosial</h5>
                            <p class="welcome-body" style="font-size: 20px;">SI BANSOS adalah</p>
                        </div>
                    </div>
                    @if (count($informasi))
                        <div class="carousel-item">
                            <img src="{{ asset('img/hero4.webp') }}" class="d-block w-100" alt="..." height="500"
                                style="filter: brightness(70%); -webkit-filter: brightness(70%); object-fit: cover;">
                            <div class="carousel-caption d-md-block">
                                <h5 class="fs-3" style="line-height: 40px">
                                    <a href="/informasi/{{ $informasi[0]->id }}"
                                        class="text-decoration-none text-white welcome">{{ substr($informasi[0]->judul_informasi, 0, 60) }}...</a>
                                </h5>
                                <p class="welcome-body" style="font-size: 20px;">{{ $informasi[0]->excerpt }}...</p>
                            </div>
                        </div>
                        @if (count($informasi) > 1)
                            <div class="carousel-item">
                                <img src="{{ asset('img/hero4.webp') }}" class="d-block w-100" alt="..."
                                    height="500"
                                    style="filter: brightness(70%); -webkit-filter: brightness(70%); object-fit: cover;">
                                <div class="carousel-caption d-md-block">
                                    <h5 class="fs-3" style="line-height: 40px">
                                        <a href="/informasi/{{ $informasi[1]->id }}"
                                            class="text-decoration-none text-white welcome">{{ substr($informasi[1]->judul_informasi, 0, 60) }}...</a>
                                    </h5>
                                    <p class="welcome-body" style="font-size: 20px;">{{ $informasi[1]->excerpt }}...</p>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                @if (count($informasi))
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
            </div>
        </section>

        {{-- fitur kami --}}
        <section class="container py-5" id="fitur" style="padding-top: 110px !important">
            <h1 class="text-center">JENIS PROGRAM BANTUAN SOSIAL</h1>
            <p class="text-center">Berikut Jenis Program Bantuan Sosial:</p>
            <div class="row mt-5 p-3 feature">
                <div class="text-center shadow rounded">
                    <img src="{{ asset('img/laporkan.jpg') }}" alt="">
                    <h4>Bantuan Pangan Non Tunai (BPNT)</h4>
                    <p>Bantuan Pangan Non Tunai (BPNT) adalah program pemerintah Indonesia yang memberikan bantuan sosial pangan kepada masyarakat kurang mampu 
                        dalam bentuk uang elektronik atau Kartu Sembako.</p>
                </div>
                <div class="text-center shadow rounded">
                    <img src="{{ asset('img/tracking.jpg') }}" alt="">
                    <h4>Program Keluarga Harapan (PKH) </h4>
                    <p>Program Keluarga Harapan (PKH) merupakan program pemberian bantuan sosial bersyarat (conditional cash transfer) kepada keluarga miskin yang ditetapkan 
                        sebagai Keluarga Penerima Manfaat (KPM) PKH.</p>
                </div>
                <div class="text-center shadow rounded">
                    <img src="{{ asset('img/selidiki.jpg') }}" alt="">
                    <h4>Bantuan Sosial Tunai (BST)</h4>
                    <p>Bantuan Sosial Tunai (BST) adalah program bantuan sosial yang diberikan oleh pemerintah Indonesia kepada keluarga miskin dan rentan miskin yang terdampak 
                        pandemi COVID-19.</p>
                </div>
            </div>
        </section>

        {{-- bantuan sosial terbaru --}}
        <section class="container" id="informasi" style="padding-top: 110px !important">
            <h1 class="text-center">Bantuan Sosial Terbaru</h1>
            <p class="text-center col-lg-8 m-auto">Dapatkan seputar informasi bantuan sosial terkini untuk memastikan
                tingkat
                transparansi dan integritas dengan memantau setiap proses penyaluran bantuan sosial</p>
            @if (count($informasi) === 0)
                <p class="text-muted text-center mt-5" style="font-style: italic;">Informasi bantuan belum ada!</p>
            @else
                <div class="articles mt-5">
                    <div class="card shadow card-main">
                        <div class="card-body">
                            <h5 class="card-title">{{ $informasi[0]->judul_informasi }}</h5>
                            <small class="text-muted mb-2 d-block" style="margin-top: -5px !important;">Updated
                                {{ $informasi[0]->created_at->diffForHumans() }}</small>
                            <p class="card-text">
                                {{ $informasi[0]->excerpt }}....</p>
                            <a href="/informasi/{{ $informasi[0]->id }}" class="btn btn-primary btn-main">Lihat
                                selengkapnya</a>
                        </div>
                    </div>
                    @foreach ($informasi->skip(1) as $info)
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $info->judul_informasi }}</h5>
                                <small class="text-muted mb-2 d-block" style="margin-top: -5px !important;">Updated
                                    {{ $info->created_at->diffForHumans() }}</small>
                                <p class="card-text">{{ $info->excerpt }}...</p>
                                <a href="/informasi/{{ $info->id }}" class="btn btn-primary">Lihat selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        {{-- tentang kami --}}
        <section class="container shadow" id="tentang"
            style="padding: 100px 100px 50px; !important; margin-top: 100px !important">
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
