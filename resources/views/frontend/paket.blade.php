<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
</head>
<body>
  <!-- Navbar gabungan -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
      <!-- Logo + Brand -->
      <a class="navbar-brand d-flex align-items-center">
        <img src="{{ asset('images/logo1.jpeg') }}" 
             alt="Logo1" width="40" height="40" class="rounded-circle me-2">
        <h1>DRIVV</h1>
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
            <a class="btn btn-outline-secondary" href="{{ route('frontend.tentang') }}">Paket</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="{{ route('frontend.tentang') }}">Kontak</a>
          </li>
          <!-- Tombol logo (button) -->
         <li class="nav-item">
            <a href="{{ route('login.page) }}" 
             class="d-inline-block p-0 border-0 bg-transparent"
             style="width: 40px; height: 40px;">
             <img src="{{ asset('images/user.jpg') }}" 
             alt="User Icon" width="40" height="40" 
             class="rounded-circle" style="pointer-events:auto;">
            </a>
         </li>

        </ul>
      </div>
    </div>
  </nav>

   <!-- Hero Section -->
  <section class="paket-section py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <!-- Kelas Memperlancar Manual -->
        <div class="col-md-5">
          <div class="paket-card text-center p-4">
            <h4 class="fw-bold mb-4">Kelas Memperlancar Manual</h4>
            <button class="paket-btn w-100 mb-3">
              6 x 60 Menit Rp 720.000 
              <span class="badge bg-info text-dark ms-2">booking sekarang</span>
            </button>
            <button class="paket-btn w-100">
              8 x 60 Menit Rp 960.000 
              <span class="badge bg-info text-dark ms-2">booking sekarang</a></span>
            </button>
          </div>
        </div>

        <!-- Kelas Dasar Manual -->
        <div class="col-md-5">
          <div class="paket-card text-center p-4">
            <h4 class="fw-bold mb-4">Kelas Dasar Manual</h4>
            <button class="paket-btn w-100 mb-3">
              10 x 60 Menit Rp 1.200.000 
              <span class="badge bg-info text-dark ms-2">booking sekarang</span>
            </button>
            <button class="paket-btn w-100 mb-3">
              14 x 60 Menit Rp 1.920.000 
              <span class="badge bg-info text-dark ms-2">booking sekarang</span>
            </button>
            <button class="paket-btn w-100">
              12 x 60 Menit Rp 1.440.000 
              <span class="badge bg-info text-dark ms-2">booking sekarang</span>
            </button>
          </div>
        </div>
      </div>

      <!-- Checkbox switch -->
      <input type="checkbox" id="lihat" hidden>
      <label for="lihat" class="opsi-lain-label">Lihat Selengkapnya</label>

      <!-- Konten tambahan yang muncul -->
      <div class="paket-lain">
        <div class="row justify-content-center mt-4">
          <div class="col-md-5">
            <div class="paket-card text-center p-4">
              <h4 class="fw-bold mb-4">Kelas Memperlancar Matic</h4>
              <button class="paket-btn w-100 mb-3">
                6 x 60 Menit Rp 840.000 
                <span class="badge bg-info text-dark ms-2">booking sekarang</span>
              </button>
              <button class="paket-btn w-100">
                8 x 60 Menit Rp 1.120.000 
                <span class="badge bg-info text-dark ms-2">booking sekarang</span>
              </button>
            </div>
          </div>

          <div class="col-md-5">
            <div class="paket-card text-center p-4">
              <h4 class="fw-bold mb-4">Kelas Dasar Matic</h4>
              <button class="paket-btn w-100 mb-3">
                10 x 60 Menit Rp 1.400.000 
                <span class="badge bg-info text-dark ms-2">booking sekarang</span>
              </button>
              <button class="paket-btn w-100 mb-3">
                12 x 60 Menit Rp 1.680.000 
                <span class="badge bg-info text-dark ms-2">booking sekarang</span>
              </button>
              <button class="paket-btn w-100">
                14 x 60 Menit Rp 1.960.000 
                <span class="badge bg-info text-dark ms-2">booking sekarang</span>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</body>
</html>
