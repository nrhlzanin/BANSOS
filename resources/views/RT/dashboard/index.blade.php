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
    <div class="col-lg-3 col-6" >
      <!-- small box -->
      <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
        <div class="inner" style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('img/pedataan.png') }}" alt="Your Image" style="width: 50%; height: auto; border-radius: 5px;">
        </div>
        <div class="icon" style="position: absolute; top: 10px; right: 10px;">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer" style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Pendataan Warga  <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box" style="background-color: #b8efdc; position: relative; overflow: hidden;">
        <div class="inner" style="padding: 10px; color: black; display: flex; justify-content: center; align-items: center;">
            <img src="{{ asset('img/checklist.png') }}" alt="Your Image" style="width: 50%; height: auto; border-radius: 5px;">
        </div>
        <div class="icon" style="position: absolute; top: 10px; right: 10px;">
            <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer" style="display: block; text-align: center; padding: 10px; background: rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(0, 0, 0, 0.1); color: black;">Informasi Bansos  <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</div>
@endsection
