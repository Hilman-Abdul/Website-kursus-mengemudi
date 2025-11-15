@extends('admin.layout')

@section('title', 'Edit User')

@section('content')

<h2 class="text-white mb-4">Edit User</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input value="Budi Santoso" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Username</label>
                <input value="budi123" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Password</label>
                <input value="123456" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>No Telepon</label>
                <input value="08123456789" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-control">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>NIK</label>
                <input value="3201123456789001" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input value="budi@email.com" type="email" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Alamat</label>
                <input value="Bandung" type="text" class="form-control">
            </div>
        </div>

        <button class="btn btn-success mt-3">Update</button>
        <a href="/users" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
