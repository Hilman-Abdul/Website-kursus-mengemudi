@extends('admin.layout')

@section('title', 'Tambah Transaksi')

@section('content')

<h2 class="text-white mb-4">Tambah Transaksi</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <div class="row">
        {{-- 1. User ID (diganti dari 'nama') --}}
        <div class="col-md-6 mb-3">
            <label>User ID / Nama</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required value="{{ old('user_id') }}">
            @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 2. Nama Paket --}}
        <div class="col-md-6 mb-3">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" required value="{{ old('nama_paket') }}">
            @error('nama_paket') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 3. Harga Paket --}}
        <div class="col-md-6 mb-3">
            <label>Harga Paket</label>
            <input type="number" name="harga_paket" class="form-control @error('harga_paket') is-invalid @enderror" required value="{{ old('harga_paket') }}">
            @error('harga_paket') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 4. Instruktur ID (diganti dari 'instruktur') --}}
        <div class="col-md-6 mb-3">
            <label>Instruktur ID / Nama</label>
            <input type="text" name="instruktur_id" class="form-control @error('instruktur_id') is-invalid @enderror" required value="{{ old('instruktur_id') }}">
            @error('instruktur_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 5. Metode Pembayaran --}}
        <div class="col-md-6 mb-3">
            <label>Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" required value="{{ old('metode_pembayaran') }}">
            @error('metode_pembayaran') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <button class="btn btn-primary mt-3">Simpan</button>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>

@endsection