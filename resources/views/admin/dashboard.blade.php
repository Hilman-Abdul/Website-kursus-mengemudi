@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

@php
    // DATA DUMMY – hanya untuk frontend sementara
    $jumlah_peserta = 1;
    $matic_lk      = 2;
    $manual_lk     = 2;
    $matic_pr      = 2;
    $manual_pr     = 2;
    $total_income  = 775000;
@endphp

<div class="row g-4">

    <div class="col-md-3">
        <div class="card-box">
            <h5>Jumlah Peserta</h5>
            <div class="value">{{ $jumlah_peserta }}</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h5>Instruktur Matic (Laki-Laki)</h5>
            <div class="value">{{ $matic_lk }}</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h5>Instruktur Manual (Laki-Laki)</h5>
            <div class="value">{{ $manual_lk }}</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h5>Instruktur Matic (Wanita)</h5>
            <div class="value">{{ $matic_pr }}</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h5>Instruktur Manual (Wanita)</h5>
            <div class="value">{{ $manual_pr }}</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box">
            <h5>Total Penghasilan</h5>
            <div class="value"style="font-size:25px;">Rp {{ number_format($total_income, 0, ',', '.') }}</div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box" style="min-height: 350px;">
            <h5>Jadwal Booking</h5>
            <iframe 
                src="https://calendar.google.com/calendar/embed?mode=MONTH&hl=id"
                width="100%" height="300" style="border:0;">
            </iframe>
        </div>
    </div>

</div>

@endsection
