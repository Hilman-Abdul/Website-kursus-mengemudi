<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
    
    {{-- Custom Styles dari Halaman Child --}}
    @yield('styles') 
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
            
            {{-- START: KOMPONEN NOTIFIKASI BARU --}}
            <div class="dropdown me-4">
                {{-- Tombol Lonceng (Dropdown Trigger) --}}
                <button class="btn btn-dark p-2 text-white position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border: none;">
                    {{-- Ikon Lonceng --}}
                    <i class="bi bi-bell-fill" style="font-size: 1.5rem;"></i>
                    
                    {{-- Badge Notifikasi Baru (Data dummy) --}}
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        2
                        <span class="visually-hidden">unread notifications</span>
                    </span>
                </button>
                
                {{-- Menu Dropdown Notifikasi --}}
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="width: 300px;">
                    <li class="dropdown-header">Notifikasi Terbaru (2)</li>
                    <li><hr class="dropdown-divider"></li>
                    
                    {{-- Notifikasi 1: User Baru -> Ke CRUD Peserta --}}
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('users.index') }}">
                            <i class="bi bi-person-plus-fill me-3 text-success"></i>
                            <div>
                                <div class="fw-bold">Ada User Baru!</div>
                                <small class="text-muted">1 jam yang lalu</small>
                            </div>
                        </a>
                    </li>
                    
                    {{-- Notifikasi 2: Transaksi Baru -> Ke CRUD Transaksi --}}
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('transaksi.index') }}">
                            <i class="bi bi-cash-stack me-3 text-info"></i>
                            <div>
                                <div class="fw-bold">Ada Transaksi Baru!</div>
                                <small class="text-muted">30 menit yang lalu</small>
                            </div>
                        </a>
                    </li>
                    
                    <li><hr class="dropdown-divider"></li>
                    
                    {{-- Link ke Halaman Notifikasi Lengkap --}}
                    <li>
                        <a class="dropdown-item text-center text-primary" href="{{ route('notifications.index') }}">
                            Lihat Semua Notifikasi
                        </a>
                    </li>
                </ul>
            </div>
            {{-- END: KOMPONEN NOTIFIKASI BARU --}}

            <img src="{{ asset('images/user.jpg') }}" class="rounded-circle" width="40" height="40">
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="content p-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS (untuk fungsionalitas Dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>