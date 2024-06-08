<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top border-bottom px-5">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/icon1.png') }}" alt="icon" width="50">
                <span class="ms-1">BANSOS</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between align-items-center"
                id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Menu untuk user yang belum login -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/#beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#jenis') }}">Jenis Bansos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#informasi') }}">Informasi</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">FAQ</a>
                        </li>
                    @endguest

                    <!-- Menu untuk user yang sudah login -->
                    @auth

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('warga.pengajuan.create') }}">Pengajuan</a>
                        </li>

                    @endauth
                </ul>
                <ul class="navbar-nav d-flex p-0 m-0 authentication d-flex justify-content-center align-items-center">
                    @guest
                        <li class="list-group">
                            <a href="/login" class="nav-link text-center bg-primary text-white rounded-pill border login px-3">Login</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item dropdown d-flex">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Selamat Datang {{ auth()->user()->warga->nama_kepalaKeluarga }}
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('warga.akun.index') }}">
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
    </nav>
</header>
