<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<body>
  <!-- Navbar gabungan -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <!-- Logo + Brand -->
      <a class="navbar-brand d-flex align-items-center">
        <img src="{{ asset('images/logo1.jpeg') }}" 
             alt="Logo1" width="40" height="40" class="rounded-circle me-2">
        <strong style>DRIVV</strong>
      </a>

      <!-- Menu navbar -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!-- ms-auto = posisi kanan | me-auto = kiri -->
        <ul class="navbar-nav ms-auto d-flex align-items-center gap-2">
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="{{ route('frontend.dashboard') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="{{ route('frontend.tentang') }}">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="{{ route('frontend.paket') }}">Paket</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="{{ route('frontend.tentang') }}">Kontak</a>
          </li>
          <!-- Tombol logo (button) -->
         <li class="nav-item">
            <a href="{{ route('frontend.index') }}" 
             class="d-inline-block p-0 border-0 bg-transparent"
             style="width: 40px; height: 40px;">
             <img src="{{ asset('images/logo1.jpeg') }}" 
             alt="User Icon" width="40" height="40" 
             class="rounded-circle" style="pointer-events:auto;">
            </a>
         </li>

        </ul>
      </div>
    </div>
  </nav>
<!-- Tombol Instagram -->
<a href="https://www.instagram.com/nama_akun_kamu" 
   target="_blank" 
   class="btn-instagram">
  <img src="{{ asset('images/instagram.png') }}" alt="Instagram" class="icon">
  <span class="text">Instagram</span>
</a>

</body>
</html>
