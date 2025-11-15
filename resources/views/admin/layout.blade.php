<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
</head>

<body>

    <!-- SIDEBAR -->
    <div id="sidebar" class="sidebar">
        <a href="/admin"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
        <a href="/users"><i class="bi bi-people"></i> <span>Peserta</span></a>
        <a href="/instruktur"><i class="bi bi-person-badge"></i> <span>Instruktur</span></a>
        <a href="/penghasilan"><i class="bi bi-cash-stack"></i> <span>Penghasilan</span></a>
        <a href="/booking"><i class="bi bi-calendar-check"></i> <span>Booking</span></a>
        <a href="/pengaturan"><i class="bi bi-gear"></i> <span>Pengaturan</span></a>
    </div>

    <!-- TOPBAR -->
    <nav class="navbar navbar-dark bg-dark px-3 topbar">
        <button class="btn btn-outline-light me-3" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <!-- Logo + Nama Aplikasi -->
        <a class="navbar-brand d-flex align-items-center" href="#">
           <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" width="35" height="35" class="rounded-circle me-2"> 
            <span>Kursus Mengemudi</span>
        </a>

        <div class="ms-auto d-flex align-items-center">
            <!-- Icon Notifikasi -->
            <a href="#" class="text-white me-4 fs-4">
                <i class="bi bi-bell"></i>
            </a>

            <!-- Foto User -->
            <img src="/images/user.jpg" class="rounded-circle" width="40" height="40">
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div id="content" class="content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
            document.getElementById("content").classList.toggle("collapsed");
        }
    </script>

</body>
</html>
