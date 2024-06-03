@extends('layouts.landing')

@section('title', 'Login Web Bansos')

@section('content')
    <section class="container" style="margin: 100px auto 300px!important">
        <div class="row justify-content-center">
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
                <form action="{{ url('proses_login') }}" method="POST" class="shadow rounded p-5 login">
                    @csrf
                    <h1 class="h3 fw-normal text-center">Silakan Masuk</h1>
                    <p class="text-center">Silakan gunakan akun anda untuk memantau dana bantuan sosial</p>

                    {{-- Image --}}
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/lockout.png') }}" alt="Login Image" class="img-fluid" style="max-height: 150px;">
                    </div>

                    <div class="form-floating mt-5 mb-4">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" value="{{ old('username') }}" required>
                        <label for="floatingInput">Username</label>
                    </div>

                    <div class="form-floating mb-4 position-relative">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <span class="input-group-text" id="basic-addon2" onclick="togglePasswordVisibility()">
                                <i class="fa fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="mb-3 text-end">
                        <a href="{{ url('forgot-password') }}">Lupa Password?</a>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                </form>
            </div>
        </div>
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

    @if (session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            alert('{{ session('success') }}');
        });
    @endif
</script>

{{-- Include Font Awesome for the eye icon --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
