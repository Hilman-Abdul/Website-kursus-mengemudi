@extends('admin.layout')

@section('title', 'Tambah Jadwal')

@section('content')
<h2 class="text-white mb-4">Tambah Jadwal</h2>

<form action="{{ route('admin.jadwal.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label text-white">User</label>
        <select name="user_id" class="form-control" required>
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Tanggal Pertemuan 1</label>
        <input type="date" name="tanggal1" class="form-control" required>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label text-white">Jam Mulai 1</label>
            <input type="time" name="jam_mulai1" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label text-white">Jam Selesai 1</label>
            <input type="time" name="jam_selesai1" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Tanggal Pertemuan 2</label>
        <input type="date" name="tanggal2" class="form-control">
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label text-white">Jam Mulai 2</label>
            <input type="time" name="jam_mulai2" class="form-control">
        </div>
        <div class="col">
            <label class="form-label text-white">Jam Selesai 2</label>
            <input type="time" name="jam_selesai2" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Gender User</label>
        <select name="gender_user" class="form-control" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label text-white">Jenis Paket</label>
        <select name="jenis_paket" class="form-control" required>
            <option value="manual">Manual</option>
            <option value="matic">Matic</option>
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
