<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #D6E6F2;">    <!-- Left navbar links -->
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ml-2">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" style="font-weight: bold;color:#0A4AA9">Sistem Informasi Pendataan Bantuan Sosial</a>
      </li>
    </ul>
    </ul>
  </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-2">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="logoutButton" role="button">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
</nav>

<script>
  // Ambil elemen tautan logout
  var logoutLink = document.getElementById('logoutButton');

  // Tambahkan event listener untuk menangani klik pada tautan logout
  logoutLink.addEventListener('click', function(event) {
      // Munculkan pesan konfirmasi
      var confirmation = confirm('Apakah Anda yakin ingin logout?');

      // Jika pengguna mengonfirmasi logout, lanjutkan dengan tindakan logout
      if (confirmation) {
          window.location.href = "/logout"; // Ganti dengan URL logout yang sesuai
      } else {
          event.preventDefault(); // Batalkan event default (tidak melakukan logout)
      }
  });
</script>
  