@extends('admin.layout')

@section('title', 'Edit Jadwal')

@section('content')

<h2 class="text-white mb-4">Edit Jadwal</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        
        {{-- 1. user_id (WAJIB) --}}
        <div class="col-md-6 mb-3">
            <label>ID User (Wajib)</label>
            <input name="user_id" value="{{ old('user_id', $jadwal->user_id) }}" type="number" class="form-control @error('user_id') is-invalid @enderror" required>
            @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 2. gender_user (WAJIB) --}}
        <div class="col-md-6 mb-3">
            <label>Gender User (Wajib)</label>
            <select name="gender_user" class="form-control @error('gender_user') is-invalid @enderror" required>
                <option value="">Pilih Gender</option>
                <option value="L" {{ old('gender_user', $jadwal->gender_user) == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                <option value="P" {{ old('gender_user', $jadwal->gender_user) == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
            </select>
            @error('gender_user') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        {{-- 3. jenis_paket (WAJIB) --}}
        <div class="col-md-6 mb-3">
            <label>Jenis Paket (Wajib)</label>
            <select name="jenis_paket" class="form-control @error('jenis_paket') is-invalid @enderror" required>
                <option value="">Pilih Jenis</option>
                <option value="manual" {{ old('jenis_paket', $jadwal->jenis_paket) == 'manual' ? 'selected' : '' }}>Manual</option>
                <option value="matic" {{ old('jenis_paket', $jadwal->jenis_paket) == 'matic' ? 'selected' : '' }}>Matic</option>
            </select>
            @error('jenis_paket') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="col-12"><h4 class="text-white mt-4">Jadwal Pertemuan 1 (Wajib Diisi)</h4></div>

        {{-- 4. tanggal1 (WAJIB) --}}
        <div class="col-md-4 mb-3">
            <label>Tanggal P1</label>
            <input type="date" name="tanggal1" class="form-control @error('tanggal1') is-invalid @enderror" required value="{{ old('tanggal1', $jadwal->tanggal1) }}">
            @error('tanggal1') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        {{-- 5. jam_mulai1 (WAJIB) --}}
        <div class="col-md-4 mb-3">
            <label>Jam Mulai P1</label>
            <input type="time" name="jam_mulai1" class="form-control @error('jam_mulai1') is-invalid @enderror" required value="{{ old('jam_mulai1', $jadwal->jam_mulai1) }}">
            @error('jam_mulai1') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 6. jam_selesai1 (WAJIB) --}}
        <div class="col-md-4 mb-3">
            <label>Jam Selesai P1</label>
            <input type="time" name="jam_selesai1" class="form-control @error('jam_selesai1') is-invalid @enderror" required value="{{ old('jam_selesai1', $jadwal->jam_selesai1) }}">
            @error('jam_selesai1') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="col-12"><h4 class="text-white mt-4">Jadwal Pertemuan 2 (Opsional)</h4></div>

        {{-- tanggal2 (OPSIONAL) --}}
        <div class="col-md-4 mb-3">
            <label>Tanggal P2</label>
            <input type="date" name="tanggal2" class="form-control @error('tanggal2') is-invalid @enderror" value="{{ old('tanggal2', $jadwal->tanggal2) }}">
            @error('tanggal2') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- jam_mulai2 (OPSIONAL) --}}
        <div class="col-md-4 mb-3">
            <label>Jam Mulai P2</label>
            <input type="time" name="jam_mulai2" class="form-control @error('jam_mulai2') is-invalid @enderror" value="{{ old('jam_mulai2', $jadwal->jam_mulai2) }}">
            @error('jam_mulai2') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        {{-- jam_selesai2 (OPSIONAL) --}}
        <div class="col-md-4 mb-3">
            <label>Jam Selesai P2</label>
            <input type="time" name="jam_selesai2" class="form-control @error('jam_selesai2') is-invalid @enderror" value="{{ old('jam_selesai2', $jadwal->jam_selesai2) }}">
            @error('jam_selesai2') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <button class="btn btn-success mt-3">Update</button>
    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>

@endsection