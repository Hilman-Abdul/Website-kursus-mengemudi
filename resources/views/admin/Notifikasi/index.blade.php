@extends('admin.layout')

@section('title', 'Pesan')

@section('content')

<h2 class="text-dark mb-4">Pesan</h2>

<div class="card mb-3" onclick="window.location='{{ route('admin.users.index') }}'" style="cursor:pointer">
    <div class="card-body">
        <h5>Peserta</h5>
        <p>Ada {{ $pesertaBaru }} Peserta baru yang hadir</p>
    </div>
</div>

<div class="card" onclick="window.location='{{ route('admin.transaksi.index') }}'" style="cursor:pointer">
    <div class="card-body">
        <h5>Transaksi</h5>
        <p>Ada {{ $transaksiBaru }} Transaksi yang masuk</p>
    </div>
</div>

@endsection
