@extends('admin.layout')

@section('title', 'Edit User')

@section('content')
<h2 class="text-white mb-4">Edit User</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input name="nama" value="{{ $user->nama }}" type="text" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Username</label>
                <input name="username" value="{{ $user->username }}" type="text" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input name="email" value="{{ $user->email }}" type="email" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Password (Kosongkan jika tidak ingin diubah)</label>
                <input name="password" type="password" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>No HP</label>
                <input name="no_hp" value="{{ $user->no_hp }}" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label>Alamat</label>
                <input name="alamat" value="{{ $user->alamat }}" type="text" class="form-control">
            </div>
        </div>

        <button class="btn btn-success mt-3">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
