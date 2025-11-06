<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - DRIVV</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <style>
    html { scroll-behavior: smooth; }
    .paket-btn { cursor: pointer; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#awal">
        <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" width="45" height="45" class="rounded-circle me-2">
        <strong>DRIVV</strong>
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto d-flex align-items-center gap-3">
          <li class="nav-item"><a class="btn btn-outline-secondary" href="#awal">Beranda</a></li>
          <li class="nav-item"><a class="btn btn-outline-secondary" href="#tentang">Tentang</a></li>
          <li class="nav-item"><a class="btn btn-outline-secondary" href="#paket">Paket</a></li>
          <li class="nav-item"><a class="btn btn-outline-secondary" href="{{ route('frontend.kontak') }}">Kontak</a></li>
          <li class="nav-item">
            <a href="{{ route('frontend.index') }}" class="d-inline-block p-0 border-0 bg-transparent">
              <img src="{{ asset('images/user.jpg') }}" alt="User" width="45" height="45" class="rounded-circle">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section text-black" id="awal">
    <div class="section-box">
      <h1 class="display-5 fw-bold text-black">Welcome!!!</h1>
      <div class="hero-box mx-auto p-4">
        <p>Selamat datang di WebSite DRIVV kami...Kami menyediakan berbagai program pembelajaran stir mobil yang interaktif dan efektif. 
           Dengan dukungan tim kami yang profesional dan berpengalamam menjadikan tempat kursus kamu sebagai kursus stir mobil.</p>
      </div>
    </div>
  </section>

  <!-- Tentang Section -->
  <section class="hero-section text-white" id="tentang">
    <div class="section-box">
      <div class="hero-box mx-auto p-4">
        <p>Kami menyediakan berbagai progma pembelajaran stir mobil yang interaktif dan menyenangkan anti was - was. 
           Dengan dukungan tim yang profesional dan ber[engalaman menjadikan tempat kursus kamu sebagai kursus stir mobil yang 
           terpercaya dan terdedikasi Menghandirkan pengalaman baru untuk Anda yang hendak belajar mengemudi. 
           Dengan kelengkapan Fasilitas yang kami sediakan demi menunjang proses belajar Anda. </p>
      </div>
    </div>
  </section>

  <!-- Paket Section -->
  <section class="paket-section" id="paket">
    <div class="section-box text-center">
      <h2 class="mt-5 text-black">Mobil Manual</h2>
      <div class="row justify-content-center">

        <!-- Manual -->
        <div class="col-md-5">
          <div class="paket-card text-center p-4">
            <h4 class="fw-bold mb-4">Kelas Memperlancar Manual</h4>
             <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 720.000</a>
             <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">8 x 60 Menit Rp 960.000</a>
          </div>
        </div>

        <div class="col-md-5">
          <div class="paket-card text-center p-4">
            <h4 class="fw-bold mb-4">Kelas Dasar Manual</h4>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.200.000</a>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">14 x 60 Menit Rp 1.920.000</a>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">12 x 60 Menit Rp 1.440.000</a>
          </div>
        </div>

      </div>

      <h2 class="mt-5 text-black">Mobil Matic</h2>
      <div class="row justify-content-center mt-4">

        <div class="col-md-5">
          <div class="paket-card text-center p-4">
            <h4 class="fw-bold mb-4">Kelas Memperlancar Matic</h4>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 840.000</a>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">8 x 60 Menit Rp 1.120.000</a>
          </div>
        </div>

        <div class="col-md-5">
          <div class="paket-card text-center p-4">
            <h4 class="fw-bold mb-4">Kelas Dasar Matic</h4>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.400.000</a>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.680.000</a>
            <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">14 x 60 Menit Rp 1.960.000</a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>
