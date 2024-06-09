@extends('layouts.appRT')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner"
                        style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/pedataan.png') }}" alt="Your Image"
                            style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('petugas.data-wargart') }}" class="small-box-footer"
                        style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Pendataan
                        Warga <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner"
                        style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/checklist.png') }}" alt="Your Image"
                            style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('petugas.bansosrt') }}" class="small-box-footer"
                        style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Informasi
                        Bansos <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner"
                        style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/validasi.png') }}" alt="Your Image"
                            style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"
                        style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Validasi
                        Warga <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
                    <div class="inner"
                        style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('img/akun.png') }}" alt="Your Image"
                            style="width: 50%; height: auto; border-radius: 5px;">
                    </div>
                    <div class="icon" style="position: absolute; top: 10px; right: 10px;">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('petugas.data-akun-warga') }}" class="small-box-footer"
                        style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Data
                        Akun Warga <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <iframe class="mx-auto" width="1200" height="450"
            src="https://lookerstudio.google.com/embed/reporting/38fb4a4b-a94e-4730-8503-d594e88429a6/page/lic2D"
            frameborder="0" style="border:0" allowfullscreen
            sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
    </div>
@endsection
