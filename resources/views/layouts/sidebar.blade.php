<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar</title>
  <!-- Tambahkan CSS yang diperlukan -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>
@php
  $user = Auth::user();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #127C56;">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('img/icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">RW 03</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/profile.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @if ($user)
          <a href="#" class="d-block">ADMIN | {{ $user->rw->nama_admin }}</a>
        @else
          <a href="#" class="d-block">Guest</a>
        @endif
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
          <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Pendataan Bansos Warga -->
        <li style="margin-bottom: 10px;" class="custom-nav-item nav-item has-treeview">
          <a href="#" class="nav-link {{ request()->is('admin/data-alternatif-warga') ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-card"></i>
            <p>Pendataan Bansos
              <i class="fas fa-chevron-circle-down right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin: 5px;">
              <a href="{{ route('admin.data-alternatif') }}" class="nav-link {{ request()->is('admin/data-alternatif-warga') ? 'active' : '' }}">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Daftar Alternatif Pengajuan</p>
              </a>                    
            </li>
            <li class="nav-item" style="margin: 5px;">
              <a href="{{ route('admin.data-warga') }}" class="nav-link {{ request()->is('admin/data-warga') ? 'active' : '' }}">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Daftar Penerima Bansos</p>
              </a>                    
            </li>
          </ul>
        </li>
        <!-- Informasi Bansos -->
        <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
          <a href="{{ route('admin.informasi-bansos') }}" class="nav-link {{ request()->is('admin/informasi-bansos') ? 'active' : '' }}">
            <i class="nav-icon fas fa fa-archive"></i>
            <p>Informasi Bansos</p>
          </a>
        </li>

        <!-- Perankingan -->
        <li style="margin-bottom: 10px;" class="custom-nav-item nav-item has-treeview {{ request()->is('admin/perankingan') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('admin/perankingan') ? 'active' : '' }}">
            <i class="nav-icon fas fa-trophy"></i>
            <p>
              Perankingan
              <i class="fas fa-chevron-circle-down right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" style="margin: 5px;">
              <a href="{{ route('admin.spk.menu') }}" class="nav-link {{ request()->is('admin/perankingan') ? 'active' : '' }}">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Bantuan Langsung Tunai (BLT)</p>
              </a>                    
            </li>
            <!-- Other menu items -->
          </ul>
        </li>

        <!-- Informasi Akun -->
        <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
          <a href="{{ route('admin.informasi.informasi-akun') }}" class="nav-link {{ request()->is('admin/informasi-akun') ? 'active' : '' }}">
            <i class="nav-icon far fa-user-circle"></i>
            <p>Informasi Akun</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
