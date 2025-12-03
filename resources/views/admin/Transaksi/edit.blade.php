@extends('admin.layout')

@section('title', 'Edit Paket Kursus')

@section('content')

{{-- Menampilkan Judul dengan data paket yang sedang diedit --}}
<h2 class="text-white mb-4">Edit Paket Kursus: {{ $paket->nama_paket }}</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    {{-- KRUSIAL: Action harus mengarah ke update dan menyertakan ID Paket --}}
    <form action="{{ route('paket_kursus.update', $paket->id) }}" method="POST">
        @csrf
        {{-- WAJIB: Method spoofing untuk UPDATE --}}
        @method('PUT')

        <div class="row">
            {{-- 1. user_id --}}
            <div class="col-md-6 mb-3">
                <label>ID User</label>
                {{-- Menggunakan old() dengan fallback $paket->user_id untuk menampilkan nilai lama --}}
                <input type="number" name="user_id" 
                       class="form-control @error('user_id') is-invalid @enderror" 
                       required 
                       value="{{ old('user_id', $paket->user_id) }}">
                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- 2. nama_paket --}}
            <div class="col-md-6 mb-3">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" 
                       class="form-control @error('nama_paket') is-invalid @enderror" 
                       required 
                       value="{{ old('nama_paket', $paket->nama_paket) }}">
                @error('nama_paket') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- 3. harga_paket --}}
            <div class="col-md-6 mb-3">
                <label>Harga Paket</label>
                <input type="number" name="harga_paket" 
                       class="form-control @error('harga_paket') is-invalid @enderror" 
                       required 
                       value="{{ old('harga_paket', $paket->harga_paket) }}">
                @error('harga_paket') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- 4. waktu_pertemuan --}}
            <div class="col-md-6 mb-3">
                <label>Waktu Pertemuan</label>
                <input type="text" name="waktu_pertemuan" 
                       class="form-control @error('waktu_pertemuan') is-invalid @enderror" 
                       required 
                       value="{{ old('waktu_pertemuan', $paket->waktu_pertemuan) }}">
                @error('waktu_pertemuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <button class="btn btn-success mt-3">Update Paket</button>
        <a href="{{ route('paket_kursus.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>

@endsection