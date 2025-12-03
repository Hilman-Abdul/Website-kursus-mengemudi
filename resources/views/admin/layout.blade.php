<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
</head>

<body>

    <!-- SIDEBAR -->
    <div id="sidebar" class="sidebar">
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i> <span>Dashboard</span></a>
        <a href="{{ route('users.index') }}"><i class="bi bi-people"></i> <span>Peserta</span></a>
        <a href="{{ route('paket_kursus.index') }}"><i class="bi bi-list-task"></i> <span>Paket Kursus</span></a>
        <a href="{{ route('instruktur.index') }}"><i class="bi bi-person-badge"></i> <span>Instruktur</span></a>
        <a href="{{ route('jadwal.index') }}"><i class="bi bi-calendar-check"></i> <span>Booking</span></a>
        <a href="{{ route('transaksi.index') }}"><i class="bi bi-cash-stack"></i> <span>Pembayaran</span></a>
        <a href="{{ route('rating.index') }}"><i class="bi bi-chat-left-text"></i> <span>Rating</span></a>
    </div>

    <!-- TOPBAR -->
    <nav class="navbar navbar-dark bg-dark px-3 topbar">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" width="35" height="35" class="rounded-circle me-2"> 
            <span>DRIVV</span>
        </a>

        <div class="ms-auto d-flex align-items-center">
            <a href="#" class="text-white me-4 fs-4">
                <i class="bi bi-bell"></i>
            </a>

            <img src="{{ asset('images/user.jpg') }}" class="rounded-circle" width="40" height="40">
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="content p-4">
        @yield('content')
    </div>

</body>
</html>
