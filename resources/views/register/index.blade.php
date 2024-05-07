@extends('layouts.main')

@section('content')
    <section class="container" style="margin: 100px auto 300px !important">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- konfirmasi password salah --}}
                @if (session()->has('passwordError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('passwordError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/register" method="POST" class="shadow rounded p-5 register">
                    @csrf
                    <h1 class="h3 fw-normal text-center">Registrasi Sekarang</h1>
                    <p class="text-center">Registrasi sekarang juga guna memantau bantuan sosial yang tersalurkan</p>
                    <div class="form-floating mt-5 mb-4">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            value="{{ old('nama') }}" placeholder="nama">
                        @error('nama')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            value="{{ old('nik') }}" placeholder="nik">
                        @error('nik')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="tel" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                            id="telepon" value="{{ old('telepon') }}" placeholder="telepon">
                        @error('telepon')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email') }}" placeholder="email">
                        @error('email')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                            id="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="tgl_lahir">
                        @error('tgl_lahir')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="name@example.com" value="{{ old('username') }}"
                            placeholder="username">
                        @error('username')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password" placeholder="password">
                        @error('password')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <label for="konfirmasi_password">Konfirmasi Password</label>
                        <input type="password" name="konfirmasi_password"
                            class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password"
                            placeholder="konfirmasi_password" placeholder="konfirmasi_password">
                        @error('konfirmasi_password')
                            <div class="invalid-feeback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
                    <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Silakan login!</a></small>
                </form>
            </div>
        </div>
    </section>
@endsection
