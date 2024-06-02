@extends('layouts.landing')

@section('title', 'Login Web Bansos')

@section('content')
    <section class="container" style="margin: 100px auto 300px!important">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                {{-- Display success message --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Display login error message --}}
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
                    <div class="form-floating mt-5 mb-4">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" value="{{ old('username') }}" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                </form>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    </section>
@endsection

<script>
    @if (session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            alert('{{ session('success') }}');
        });
    @endif
</script>
