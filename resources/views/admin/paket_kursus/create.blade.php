@extends('admin.layout')

@section('title', 'Tambah Paket Kursus')

@section('content')
<h2 class="text-white mb-4">Tambah Paket Kursus</h2>

<form action="{{ route('admin.paket_kursus.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label text-white">User</label>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih User --</option>
            @foreach(\App\Models\User::all() as $user)
            <option value="{{ $user->id }}">{{ $user->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Nama Paket</label>
        <input type="text" name="nama_paket" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Harga Paket</label>
        <input type="number" name="harga_paket" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Waktu Pertemuan</label>
        <input type="text" name="waktu_pertemuan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Jenis Paket</label>
        <select name="jenis_paket" class="form-control" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="manual">Manual</option>
            <option value="matic">Matic</option>
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
