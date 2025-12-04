@extends('admin.layout')

@section('title', 'Notifikasi')

@section('content')

<h2 class="text-white mb-4">Daftar Notifikasi</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    
    {{-- Data Notifikasi Dummy --}}
    @php
        $notifications = [
            ['id' => 1, 'type' => 'User Baru', 'message' => 'User baru bernama Andi telah mendaftar.', 'time' => '1 jam yang lalu', 'icon' => 'bi-person-plus-fill', 'color' => 'success', 'route' => 'peserta.index'],
            ['id' => 2, 'type' => 'Transaksi Baru', 'message' => 'Pembayaran paket Matic dari Budi telah dikonfirmasi.', 'time' => '30 menit yang lalu', 'icon' => 'bi-cash-stack', 'color' => 'info', 'route' => 'transaksi.index'],
            ['id' => 3, 'type' => 'User Baru', 'message' => 'User baru bernama Citra telah mendaftar.', 'time' => '5 jam yang lalu', 'icon' => 'bi-person-plus-fill', 'color' => 'success', 'route' => 'peserta.index'],
            ['id' => 4, 'type' => 'Peringatan', 'message' => 'Sistem akan maintenance malam ini.', 'time' => 'Kemarin', 'icon' => 'bi-exclamation-triangle-fill', 'color' => 'warning', 'route' => 'dashboard'],
        ];
    @endphp

    @if(count($notifications) > 0)
        <ul class="list-group list-group-flush">
            @foreach($notifications as $notif)
            <li class="list-group-item d-flex align-items-center" style="background:transparent; color:white;">
                <i class="bi {{ $notif['icon'] }} me-3 text-{{ $notif['color'] }}" style="font-size: 1.5rem;"></i>
                
                <div class="flex-grow-1">
                    <a href="{{ route($notif['route']) ?? '#' }}" class="text-decoration-none" style="color:inherit;">
                        <div class="fw-bold">{{ $notif['type'] }}</div>
                        <small>{{ $notif['message'] }}</small>
                    </a>
                </div>
                
                <small class="text-muted ms-auto">{{ $notif['time'] }}</small>
            </li>
            @endforeach
        </ul>
    @else
        <p class="text-center text-muted">Tidak ada notifikasi baru saat ini.</p>
    @endif

</div>

@endsection