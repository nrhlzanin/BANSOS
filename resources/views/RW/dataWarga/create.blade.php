@extends('RW.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div class="col-lg-8">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah </h1>
            </div>
            <form action="/dashboard/admin/informasi" method="POST">
                @csrf
                {{-- nama --}}
                <div class="mb-3">
                    <label for="judul_informasi" class="form-label">Nama : </label>
                    <input type="text" class="form-control"
                        name="judul_informasi" id="judul_informasi" placeholder="Judul Informasi Bantuan">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection