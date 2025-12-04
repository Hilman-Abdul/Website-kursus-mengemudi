@extends('admin.layout')

@section('title', 'Dashboard')

@section('styles')
    <style>
        /* Gaya dasar untuk tampilan card */
        .card-box {
            background: #2d3748; /* Warna latar belakang gelap (sesuai tema) */
            color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            min-height: 120px; /* Tinggi minimum */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-box h5 {
            font-size: 16px;
            font-weight: 500;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .card-box .value {
            font-size: 36px;
            font-weight: 700;
            color: #48bb78; /* Hijau cerah untuk nilai */
        }
        
        .card-box .value.income {
            font-size: 25px !important;
            color: #ecc94b; /* Kuning/emas untuk penghasilan */
        }

        /* Styling untuk iframe Calendar agar responsive */
        .calendar-container {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #4a5568;
        }

        .calendar-container iframe {
            display: block;
        }
    </style>
@endsection

@section('content')

@php
    // DATA DUMMY – hanya untuk frontend sementara
    $jumlah_peserta = 120;
    $matic_lk       = 15;
    $manual_lk      = 12;
    $matic_pr       = 10;
    $manual_pr      = 8;
    $total_income   = 15000000;

    // Fungsi untuk memformat mata uang Rupiah
    $format_rupiah = function($amount) {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    };
@endphp

<h2 class="text-white mb-4">Dashboard Administrasi</h2>

<div class="row g-4">

    {{-- KARTU 1: Jumlah Peserta --}}
    <div class="col-md-3 col-sm-6">
        <div class="card-box">
            <h5>Jumlah Peserta</h5>
            <div class="value">{{ $jumlah_peserta }}</div>
        </div>
    </div>

    {{-- KARTU 2: Instruktur Matic (Laki-Laki) --}}
    <div class="col-md-3 col-sm-6">
        <div class="card-box">
            <h5>Instruktur Matic (Laki-Laki)</h5>
            <div class="value">{{ $matic_lk }}</div>
        </div>
    </div>

    {{-- KARTU 3: Instruktur Manual (Laki-Laki) --}}
    <div class="col-md-3 col-sm-6">
        <div class="card-box">
            <h5>Instruktur Manual (Laki-Laki)</h5>
            <div class="value">{{ $manual_lk }}</div>
        </div>
    </div>

    {{-- KARTU 4: Instruktur Matic (Wanita) --}}
    <div class="col-md-3 col-sm-6">
        <div class="card-box">
            <h5>Instruktur Matic (Wanita)</h5>
            <div class="value">{{ $matic_pr }}</div>
        </div>
    </div>

    {{-- KARTU 5: Instruktur Manual (Wanita) --}}
    <div class="col-md-3 col-sm-6">
        <div class="card-box">
            <h5>Instruktur Manual (Wanita)</h5>
            <div class="value">{{ $manual_pr }}</div>
        </div>
    </div>

    {{-- KARTU 6: Total Penghasilan --}}
    <div class="col-md-3 col-sm-6">
        <div class="card-box">
            <h5>Total Penghasilan</h5>
            {{-- Menggunakan class 'income' untuk custom font-size --}}
            <div class="value income">{{ $format_rupiah($total_income) }}</div>
        </div>
    </div>

    {{-- KARTU BESAR: Jadwal Booking (Calendar) --}}
    <div class="col-md-6 col-sm-12">
        <div class="card-box" style="min-height: 350px;">
            <h5>Jadwal Booking</h5>
            <div class="calendar-container flex-grow" style="flex-grow: 1;">
                <iframe 
                    src="https://calendar.google.com/calendar/embed?mode=MONTH&hl=id"
                    width="100%" height="300" style="border:0;">
                </iframe>
            </div>
        </div>
    </div>

</div>

@endsection