<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DRIVV</title>

  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="icon" type="image/jpeg" href="{{ asset('images/logo1.jpeg') }}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    html { scroll-behavior: smooth; }
    .paket-btn { cursor: pointer; }
  </style>
</head>
<body>

<!-- ========================== NAVBAR ========================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
  <div class="container-fluid">

    <a class="navbar-brand d-flex align-items-center" href="#awal">
      <img src="{{ asset('images/logo1.jpeg') }}" width="45" height="45" class="rounded-circle me-2">
      <strong>DRIVV</strong>
    </a>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto d-flex align-items-center gap-3">
        <li class="nav-item"><a class="btn btn-outline-secondary" href="#awal">Beranda</a></li>
        <li class="nav-item"><a class="btn btn-outline-secondary" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="btn btn-outline-secondary" href="#paket">Paket</a></li>
        <li class="nav-item"><a class="btn btn-outline-secondary" href="#rating">Rating</a></li>
        <li class="nav-item"><a class="btn btn-outline-secondary" href="#info">Info</a></li>

        <li class="nav-item">
          <div class="ms-auto d-flex align-items-center">

            <!-- BELL -->
            <a href="#" class="text-black me-3 fs-3" data-bs-toggle="modal" data-bs-target="#notifModal">
              <i class="bi bi-bell-fill"></i>
            </a>

            @guest
              <!-- Jika BELUM LOGIN -->
              <a href="{{ route('login.page', ['source' => 'navbar']) }}">
                <img src="{{ asset('images/user.jpg') }}" class="rounded-circle" width="40" height="40">
              </a>

            @else
              <!-- Jika SUDAH LOGIN -->
              <a href="{{ route('frontend.profile') }}" class="d-flex align-items-center">
              <!--<img src="{{ Auth::user()->foto ? asset('storage/foto/' . Auth::user()->foto) : asset('images/user.jpg') }}">-->
                <img src="{{ asset('images/user.jpg') }}"
                     class="rounded-circle" width="40" height="40" style="object-fit: cover;">
              </a>

              <span class="ms-2 text-dark fw-bold">
                {{ Auth::user()->username }}
              </span>
            @endguest

          </div>
        </li>
      </ul>
    </div>

  </div>
</nav>


<!-- ========================== BERANDA ========================== -->
<section class="hero-section" id="awal">
  <div class="text-box">
    <h1 data-aos="fade-up" data-aos-delay="200">Selamat Datang di DRIVV</h1>
    <p data-aos="fade-up" data-aos-delay="300">
      Kami menyediakan berbagai program pembelajaran stir mobil yang interaktif
      dan efektif dengan instruktur berpengalaman.
    </p>
  </div>

  <div class="image-box" data-aos="fade-left" data-aos-delay="400"></div>
</section>


<!-- ========================== TENTANG ========================== -->
<section class="hero-section" id="tentang">
  <div class="image-box" data-aos="fade-right" data-aos-delay="400"></div>

  <div class="text-box">
    <h1 data-aos="fade-up" data-aos-delay="200">Tentang Kami</h1>
    <p data-aos="fade-up" data-aos-delay="300">
      DRIVV menghadirkan pengalaman belajar mengemudi yang aman, nyaman,
      dan mudah dipahami bagi semua kalangan.
    </p>
  </div>
</section>


<!-- ========================== PAKET ========================== -->
<section class="paket-section" id="paket">
  <div class="paket-container">

    <!-- ===================== MANUAL ===================== -->
    <div class="paket-wrapper text-center">
      <h2 class="text-black mb-4">Mobil Manual</h2>

      <!-- KELAS MEMPERLANCAR MANUAL -->
      <div class="paket-card p-4">
        <h4 class="fw-bold mb-4">Kelas Memperlancar Manual</h4>

        @guest
          {{-- Belum login --}}
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 720.000</a>
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">8 x 60 Menit Rp 960.000</a>

        @else
          @if(Auth::user()->nik == null)
            {{-- Sudah login tapi data diri belum lengkap --}}
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 720.000</a>
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">8 x 60 Menit Rp 960.000</a>

          @else
            {{-- Data lengkap → simpan paket & lanjut jadwal --}}
            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Memperlancar Manual">
              <input type="hidden" name="waktu" value="6 x 60 Menit">
              <input type="hidden" name="harga" value="720000">
              <input type="hidden" name="jenis_paket" value="manual">
              <button class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 720.000</button>
            </form>

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Memperlancar Manual">
              <input type="hidden" name="waktu" value="8 x 60 Menit">
              <input type="hidden" name="harga" value="960000">
              <input type="hidden" name="jenis_paket" value="manual">
              <button class="btn paket-btn w-100 mb-3">8 x 60 Menit Rp 960.000</button>
            </form>

          @endif
        @endguest
      </div>

      <!-- KELAS DASAR MANUAL -->
      <div class="paket-card p-4 mt-4">
        <h4 class="fw-bold mb-4">Kelas Dasar Manual</h4>

        @guest
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.200.000</a>
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.440.000</a>
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100">14 x 60 Menit Rp 1.920.000</a>

        @else
          @if(Auth::user()->nik == null)

            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.200.000</a>
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.440.000</a>
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100">14 x 60 Menit Rp 1.920.000</a>

          @else

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Dasar Manual">
              <input type="hidden" name="waktu" value="10 x 60 Menit">
              <input type="hidden" name="harga" value="1200000">
              <input type="hidden" name="jenis_paket" value="manual">
              <button class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.200.000</button>
            </form>

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Dasar Manual">
              <input type="hidden" name="waktu" value="12 x 60 Menit">
              <input type="hidden" name="harga" value="1440000">
              <input type="hidden" name="jenis_paket" value="manual">
              <button class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.440.000</button>
            </form>

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Dasar Manual">
              <input type="hidden" name="waktu" value="14 x 60 Menit">
              <input type="hidden" name="harga" value="1920000">
              <input type="hidden" name="jenis_paket" value="manual">
              <button class="btn paket-btn w-100">14 x 60 Menit Rp 1.920.000</button>
            </form>

          @endif
        @endguest
      </div>
    </div>

    <div class="paket-separator"></div>

    <!-- ===================== MATIC ===================== -->
    <div class="paket-wrapper text-center">
      <h2 class="text-black mb-4">Mobil Matic</h2>

      <!-- KELAS MEMPERLANCAR MATIC -->
      <div class="paket-card p-4">
        <h4 class="fw-bold mb-4">Kelas Memperlancar Matic</h4>

        @guest
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 840.000</a>
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">8 x 60 Menit Rp 1.120.000</a>

        @else
          @if(Auth::user()->nik == null)

            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 840.000</a>
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">8 x 60 Menit Rp 1.120.000</a>

          @else

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Memperlancar Matic">
              <input type="hidden" name="waktu" value="6 x 60 Menit">
              <input type="hidden" name="harga" value="840000">
              <input type="hidden" name="jenis_paket" value="matic">
              <button class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 840.000</button>
            </form>

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Memperlancar Matic">
              <input type="hidden" name="waktu" value="8 x 60 Menit">
              <input type="hidden" name="harga" value="1120000">
              <input type="hidden" name="jenis_paket" value="matic">
              <button class="btn paket-btn w-100 mb-3">8 x 60 Menit Rp 1.120.000</button>
            </form>

          @endif
        @endguest
      </div>

      <!-- KELAS DASAR MATIC -->
      <div class="paket-card p-4 mt-4">
        <h4 class="fw-bold mb-4">Kelas Dasar Matic</h4>

        @guest
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.400.000</a>
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.680.000</a>
          <a href="{{ route('login.page', ['source' => 'paket']) }}" class="btn paket-btn w-100">14 x 60 Menit Rp 1.960.000</a>

        @else
          @if(Auth::user()->nik == null)

            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.400.000</a>
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.680.000</a>
            <a href="{{ route('data.lengkapi') }}" class="btn paket-btn w-100">14 x 60 Menit Rp 1.960.000</a>

          @else

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Dasar Matic">
              <input type="hidden" name="waktu" value="10 x 60 Menit">
              <input type="hidden" name="harga" value="1400000">
              <input type="hidden" name="jenis_paket" value="matic">
              <button class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.400.000</button>
            </form>

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Dasar Matic">
              <input type="hidden" name="waktu" value="12 x 60 Menit">
              <input type="hidden" name="harga" value="1680000">
              <input type="hidden" name="jenis_paket" value="matic">
              <button class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.680.000</button>
            </form>

            <form action="{{ route('pilih.paket') }}" method="POST">
              @csrf
              <input type="hidden" name="nama_paket" value="Dasar Matic">
              <input type="hidden" name="waktu" value="14 x 60 Menit">
              <input type="hidden" name="harga" value="1960000">
              <input type="hidden" name="jenis_paket" value="matic">
              <button class="btn paket-btn w-100">14 x 60 Menit Rp 1.960.000</button>
            </form>

          @endif
        @endguest
      </div>
    </div>

  </div>
</section>

<!-- ========================== TESTIMONIAL ========================== -->
<section class="testimonial-section" id="rating">
  <div class="testimonial-wrapper">

      @foreach($ratings as $rating)
          <div class="testimonial-card">
              <p class="testimonial-text">
                  {{ $rating->komentar }}
              </p>
  
              <div class="testimonial-user">
                  <img src="{{ asset('images/user.jpg') }}">
                  <div>
                      <h4>{{ $rating->user->name }}</h4>
                      <span>{{ $rating->pekerjaan ?? 'Tidak diketahui' }}</span>
                  </div>
              </div>
          </div>
      @endforeach
  
  </div>

</section>


<!-- ========================== INFO ========================== -->
<section class="text-center" id="info">

  <div class="map-container mb-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.619404235191!2d106.90814177355769!3d-6.442891862998972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eab4daedeb4f%3A0x9a3ae3c6e8805e77!2sAde%20Stir%20(Kursus%20Mengemudi)!5e0!3m2!1sid!2sid!4v1764131084478!5m2!1sid!2sid"
            width="450" height="300" style="border:0;" loading="lazy"></iframe>
  </div>

  <div class="social-group">
    <a href="https://facebook.com" class="icon facebook" target="_blank">
      <i class="fab fa-facebook-f"></i><span class="label">Facebook</span>
    </a>

    <a href="https://www.instagram.com/drivv_id?igsh=MWE3YWZoMWNqdzUyYQ==" class="icon instagram" target="_blank">
      <i class="fab fa-instagram"></i><span class="label">Instagram</span>
    </a>

    <a href="https://wa.me/6281234567890" class="icon whatsapp" target="_blank">
      <i class="fab fa-whatsapp"></i><span class="label">WhatsApp</span>
    </a>
  </div>

</section>


<!-- ========================== MODAL NOTIF ========================== -->
<div class="modal fade" id="notifModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content bg-dark text-white">

      <div class="modal-header border-secondary">
        <h5 class="modal-title">Notifikasi Kursus Mobil</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <div class="card bg-secondary p-3 mb-3">
          <h6>Kursus Mobil Manual</h6>
          <p>Tanggal: <strong>20 November 2025</strong></p>
          <p>Jam: <strong>13:00 - 15:00</strong></p>
          <div class="text-warning">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
            <i class="bi bi-star"></i>
            <span class="text-white">(3.5)</span>
          </div>
        </div>

      </div>

      <div class="modal-footer border-secondary">
        <button class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>


<!-- ========================== SCRIPT ========================== -->
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init({
  duration: 900,
  once: true
});
</script>

</body>
</html>
