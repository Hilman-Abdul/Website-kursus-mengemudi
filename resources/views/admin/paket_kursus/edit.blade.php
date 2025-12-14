@extends('admin.layout')

@section('title', 'Edit Paket Kursus')

@section('content')
<h2 class="text-white mb-4">Edit Paket Kursus</h2>

<form action="{{ route('admin.paket_kursus.update', $paket->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label text-white">User</label>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih User --</option>
            @foreach(\App\Models\User::all() as $user)
            <option value="{{ $user->id }}" {{ $paket->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->nama }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Nama Paket</label>
        <input type="text" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Harga Paket</label>
        <input type="number" name="harga_paket" class="form-control" value="{{ $paket->harga_paket }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Waktu Pertemuan</label>
        <input type="text" name="waktu_pertemuan" class="form-control" value="{{ $paket->waktu_pertemuan }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Jenis Paket</label>
        <select name="jenis_paket" class="form-control" required>
            <option value="manual" {{ $paket->jenis_paket == 'manual' ? 'selected' : '' }}>Manual</option>
            <option value="matic" {{ $paket->jenis_paket == 'matic' ? 'selected' : '' }}>Matic</option>
        </select>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.paket_kursus.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
