<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DRIVV</title>

  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="icon" type="image/jpeg" href="{{ asset('images/logo1.jpeg') }}">


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
          <li class="nav-item"><a class="btn btn-outline-secondary" href="#rating">rating</a></li>
          <li class="nav-item"><a class="btn btn-outline-secondary" href="#info">Info</a></li>
          <li class="nav-item">
            <a href="{{ route('frontend.index') }}">
              <img src="{{ asset('images/user.jpg') }}" alt="User" width="45" height="45" class="rounded-circle">
               <input type="file" id="upload-photo" accept="image/*" style="display:none;">
            </a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

    <!-- Halaman Beranda -->
<section class="hero-section" id="awal">
  <div class="text-box">
    <h1 class="focus-in" data-aos="fade-up" data-aos-delay="200">Selamat Datang di DRIVV</h1>
    <p class="focus-in" data-aos="fade-up" data-aos-delay="300">
      Kami menyediakan berbagai program pembelajaran stir mobil yang interaktif
      dan efektif. Dengan tim profesional dan berpengalaman menjadikan pengalaman
      belajar Anda menyenangkan dan aman di jalan.
    </p>
  </div>
  <div class="image-box"data-aos="fade-left" data-aos-delay="400"></div>
</section>

<!-- Halaman Tentang -->
<section class="hero-section" id="tentang">
  <div class="image-box" data-aos="fade-right" data-aos-delay="400"></div>
  <div class="text-box">
    <h1 class="focus-in" data-aos="fade-up" data-aos-delay="200">Tentang Kami</h1>
    <p class="focus-in" data-aos="fade-up" data-aos-delay="300">
      Kami menghadirkan pengalaman baru belajar mengemudi dengan instruktur ramah,
      fasilitas lengkap, dan metode belajar yang mudah dipahami. DRIVV berkomitmen
      menjadikan Anda pengemudi yang percaya diri dan aman di jalan.
    </p>
  </div>
</section>

  <!-- Paket Section (fade-left) -->
 <section class="paket-section" id="paket">

  <div class="paket-container">

    <div class="paket-wrapper text-center">
      <h2 class="text-black mb-4">Mobil Manual</h2>

      <div class="paket-card p-4">
        <h4 class="fw-bold mb-4">Kelas Memperlancar Manual</h4>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 720.000</a>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">8 x 60 Menit Rp 960.000</a>
      </div>

      <div class="paket-card p-4 mt-4">
        <h4 class="fw-bold mb-4">Kelas Dasar Manual</h4>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.200.000</a>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">14 x 60 Menit Rp 1.920.000</a>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">12 x 60 Menit Rp 1.440.000</a>
      </div>
    </div>

    <div class="paket-separator"></div>

    <div class="paket-wrapper text-center">
      <h2 class="text-black mb-4">Mobil Matic</h2>

      <div class="paket-card p-4">
        <h4 class="fw-bold mb-4">Kelas Memperlancar Matic</h4>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">6 x 60 Menit Rp 840.000</a>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">8 x 60 Menit Rp 1.120.000</a>
      </div>

      <div class="paket-card p-4 mt-4">
        <h4 class="fw-bold mb-4">Kelas Dasar Matic</h4>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">10 x 60 Menit Rp 1.400.000</a>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100 mb-3">12 x 60 Menit Rp 1.680.000</a>
        <a href="{{ route('frontend.transaksi') }}" class="btn paket-btn w-100">14 x 60 Menit Rp 1.960.000</a>
      </div>
    </div>
  </div>
 </section>

 <section class="testimonial-section"id="#rating">
    <div class="testimonial-overlay">
        <div class="testimonial-header">
            <h1>What do They Say About Us</h1>
            <p class="sub-title">Testimonial</p>
            <p class="subtitle-small">What They Say About Us</p>
        </div>

        <!-- Wrapper Scroll -->
        <div class="testimonial-wrapper">

            <!-- CARD 1 -->
            <div class="testimonial-card">
                <p class="testimonial-text">
                    Aku puas banget Kursus Mengemudi di RDC, terutama karena materi yang diajarkan
                    oleh RDC sangat lengkap dan materinya disampaikan dengan bahasa yang simple sehingga
                    mudah dipahami serta aku diajarkan dengan instruktur yang baik banget.
                </p>

                <div class="testimonial-user">
                    <img src="{{ asset('images/user2.jpg') }}" alt="user">
                    <div>
                        <h4>sandi maulana.i</h4>
                        <span>kolsultan it</span>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="testimonial-card">
                <p class="testimonial-text">
                    Instruktur RDC sabar banget mengajari aku dari nol sampai bisa. Mobil latihan nyaman
                    dan suasananya juga tidak tegang. Recommended banget buat yang baru mau belajar.
                </p>

                <div class="testimonial-user">
                    <img src="{{ asset('images/user1.webp') }}" alt="user">
                    <div>
                        <h4>Rizky Pratama</h4>
                        <span>Mahasiswa</span>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="testimonial-card">
                <p class="testimonial-text">
                    Pelatihnya ramah dan profesional. Penyampaiannya jelas, bikin aku cepat paham.
                    Tempat ini bener-bener bantu aku percaya diri saat mengemudi di jalan umum.
                </p>

                <div class="testimonial-user">
                    <img src="{{ asset('images/user.jpg') }}" alt="user">
                    <div>
                        <h4>Aulia Safira</h4>
                        <span>Karyawan Swasta</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

  <!-- Social Media Section -->
  <section class="text-center" id="info">
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21758.56454034096!2d106.88897882398544!3d-6.44182518525176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eab4daedeb4f%3A0x9a3ae3c6e8805e77!2sAde%20Stir%20(Kursus%20Mengemudi)!5e0!3m2!1sid!2sid!4v1761697040935!5m2!1sid!2sid"
        width="450" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
     
    <div class="social-group">
      <div class="icon facebook"><i class="fab fa-facebook-f"></i><span class="label">Facebook</span></div>
      <div class="icon instagram"><i class="fab fa-instagram"></i><span class="label">Instagram</span></div>
      <div class="icon twitter"><i class="fab fa-x-twitter"></i><span class="label">Twitter</span></div>
      <div class="icon youtube"><i class="fab fa-youtube"></i><span class="label">YouTube</span></div>
    </div>
  </section>

  <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init({ duration: 900, once: true });

  document.addEventListener("aos:in", (event) => {
    const section = event.detail;
    const items = section.querySelectorAll(".stagger");

    items.forEach((el, index) => {
      setTimeout(() => {
        el.classList.add("show"); // munculkan
        // restart animista animation supaya dimulai dari awal
        el.style.animation = "none";
        el.offsetHeight; // trigger reflow
        el.style.animation = ""; 
      }, index * 300); // 300ms = HALUS
    });
  });
  </script>


  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>

   <script>
    const stars = document.querySelectorAll('.star');
    const ratingValue = document.getElementById('rating-value');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            ratingValue.value = this.getAttribute('data-value');

            stars.forEach(s => s.classList.remove('active'));
            for (let i = 0; i < this.getAttribute('data-value'); i++) {
                stars[i].classList.add('active');
            }
        });
    });
  </script>

</body>
</html>
