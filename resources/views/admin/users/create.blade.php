@extends('admin.layout')

@section('title', 'Tambah User')

@section('content')

<h2 class="text-white mb-4">Tambah User</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Masukkan nama">
            </div>

            <div class="col-md-6 mb-3">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Masukkan username">
            </div>

            <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Masukkan password">
            </div>

            <div class="col-md-6 mb-3">
                <label>No Telepon</label>
                <input type="text" class="form-control" placeholder="Masukkan no telepon">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-control">
                    <option value="">-- pilih --</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>NIK</label>
                <input type="text" class="form-control" placeholder="Masukkan NIK">
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Masukkan email">
            </div>

            <div class="col-md-6 mb-3">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Masukkan alamat">
            </div>
        </div>

        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="/users" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
