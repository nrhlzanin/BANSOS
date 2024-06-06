<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/icon1.png') }}" alt="icon" width="50">
                <span class="ms-1">BANSOS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Menu untuk user yang belum login -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#jenis">Jenis Bansos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#informasi">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">FAQ</a>
                        </li>
                        <ul class="nav-item d-flex p-0 ms-5 authentication">
                            <li class="list-group">
                                <a href="/login" class="nav-link text-center bg-primary text-white rounded-pill border login px-3">Login</a>
                            </li>
                        </ul>
                    @endguest

                    <!-- Menu untuk user yang sudah login -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pengumuman">Pengumuman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('warga.pengajuan.create') }}">Pengajuan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Selamat Datang {{ auth()->user()->warga->nama_kepalaKeluarga }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/profile">
                                        <i class="bi bi-person"></i><span class="ms-2">Profil Saya</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt"></i><span class="ms-2">Keluar</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
