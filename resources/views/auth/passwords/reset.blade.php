@extends('layouts.landing', ['hideFooter' => true])

@section('title', 'Reset Password')

@section('content')
<section class="container" style="margin: 100px auto 300px!important">
    <h1 class="h3 fw-bold text-center">Reset Password</h1>
    <header class="animate__animated animate__fadeInUp">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group mt-3 mb-3">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', $email) }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password Baru" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password-confirm">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Konfirmasi Password Baru" required>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Reset Password</button>
                </form>
            </div>
        </div>
    </header>
</section>
@endsection
