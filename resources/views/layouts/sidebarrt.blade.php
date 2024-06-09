 
  @php
    $rt = Auth::user()->rt;
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #127C56;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('img/icon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">RT {{ $rt->no_rt ?? 'Undefined' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/profile.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">PETUGAS | RT {{ $rt->no_rt ?? 'Undefined' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
            <a href="{{ url('petugas') }}" class="nav-link {{ request()->is('petugas') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="custom-nav-item nav-item has-treeview" style="margin-bottom: 10px;">
              <a href="{{ route('petugas.data-wargart') }}" class="nav-link {{ request()->is('petugas/data-warga') ? 'active' : '' }}">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Data Warga
              </p>
            </a>
          </li>
          <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
            <a href="{{ route('petugas.bansosrt') }}" class="nav-link {{ request()->is('petugas/informasi-bansos') ? 'active' : '' }}">
              <i class="nav-icon fas fa fa-archive"></i>
              <p>Informasi Bansos</p>
            </a>
          </li>
          <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
            <a href="{{ route('petugas.data-akun-warga') }}" class="nav-link {{ request()->is('petugas/data-akun-warga') ? 'active' : '' }}">
                <i class="nav-icon far fa-user-circle"></i>
                <p>Data Akun Warga</p>
            </a>
        </li>
        
          <li class="custom-nav-item nav-item" style="margin-bottom: 10px;">
            <a href="{{ route('petugas.infomasi-akunrt') }}" class="nav-link {{ request()->is('petugas/informasi-akun') ? 'active' : '' }}">                <i class="nav-icon far fa-user-circle"></i>
                <p>Informasi Akun</p>
            </a>
        </li>
    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
