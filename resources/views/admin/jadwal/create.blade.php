@extends('admin.layout')

@section('title', 'Tambah Jadwal')

@section('content')

<h2 class="text-white mb-4">Tambah Jadwal</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama User</label>
                <input type="text" class="form-control" placeholder="Masukkan nama user">
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
                <label>Paket</label>
                <select class="form-control">
                    <option value="">-- pilih paket --</option>
                    <option>Manual</option>
                    <option>Matic</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Jam</label>
                <input type="time" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Tanggal</label>
                <input type="date" class="form-control">
            </div>

        </div>

        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="/jadwal" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
