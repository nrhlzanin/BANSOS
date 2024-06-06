@extends('layouts.landing',['hideFooter' => true])

@section('title', 'Login Web Bansos')

@section('content')
    
    <section class="container" style="margin: 100px auto 300px!important">
        <h1 class="h3 fw-bold text-center">Selamat Datang</h1>
        <header class="animate__animated animate__fadeInUp">
        <div class="row justify-content-center" >
            <div class="col-lg-8">
                {{-- Register success --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Login error --}}
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Login form --}}
                <div class="row shadow rounded p-2 login" style="background-color: #fff;">
                    {{-- Image --}}
                    <div class="col-md-6 text-center my-auto">
                        <img src="{{ asset('img/lockout.png') }}" alt="Login Image" class="img-fluid" style="max-height: 300px;">
                    </div>

                    <div class="col-md-6">
                        <form action="{{ url('proses_login') }}" method="POST">
                            @csrf
                            <div class="form-floating mt-5 mb-4">
                            <p class="text-center">Silahkan gunakan akun anda untuk memantau dana bantuan sosial</p>
                            </div>

                            <div class="form-floating mt-5 mb-4">
                                <label for="floatingInput">Username</label>
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" value="{{ old('username') }}" required>
                            </div>

                            <div class="form-floating mb-4 position-relative">
                                <label for="floatingPassword">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <span class="input-group-text" id="basic-addon2" onclick="togglePasswordVisibility()">
                                        <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3 text-end">
                                <a href="{{ url('forgot-password') }}">Lupa Password?</a>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </header>
    </section>
@endsection

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('floatingPassword');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');
        const isPasswordVisible = passwordInput.type === 'text';
        passwordInput.type = isPasswordVisible ? 'password' : 'text';
        togglePasswordIcon.classList.toggle('fa-eye-slash', !isPasswordVisible);
        togglePasswordIcon.classList.toggle('fa-eye', isPasswordVisible);
    }
</script>

{{-- Include Font Awesome for the eye icon --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    body {
        background-color: #DDE6E3 !important;
    }
</style>
