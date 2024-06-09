@extends('layouts.landing', ['hideFooter' => true])

@section('title', 'Forgot Password')

@section('content')
<section class="container" style="margin: 100px auto 300px!important">
    <h1 class="h3 fw-bold text-center">Lupa Password</h1>
    <header class="animate__animated animate__fadeInUp">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mt-3 mb-3">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Kirim Link Reset Password</button>
                </form>
            </div>
        </div>
    </header>
</section>
@endsection
