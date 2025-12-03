@extends('admin.layout')

@section('content')
<h2 class="text-white mb-4">Tambah User</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label text-white">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    {{-- Tambahkan NO HP --}}
    <div class="mb-3">
        <label class="form-label text-white">No HP</label>
        <input type="text" name="no_hp" class="form-control">
    </div>

    {{-- Tambahkan Jenis Kelamin --}}
    <div class="mb-3">
        <label class="form-label text-white">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    {{-- Tambahkan Alamat --}}
    <div class="mb-3">
        <label class="form-label text-white">Alamat</label>
        <input type="text" name="alamat" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
