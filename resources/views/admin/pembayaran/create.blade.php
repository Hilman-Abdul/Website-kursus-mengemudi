@extends('admin.layout')

@section('title', 'Tambah Pembayaran')

@section('content')

<h2 class="text-white mb-4">Tambah Pembayaran</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama User</label>
                <input type="text" class="form-control" placeholder="Masukkan nama user">
            </div>

            <div class="col-md-6 mb-3">
                <label>Nama Paket</label>
                <input type="text" class="form-control" placeholder="Masukkan nama paket">
            </div>

            <div class="col-md-6 mb-3">
                <label>Harga Paket</label>
                <input type="number" class="form-control" placeholder="Masukkan harga">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jadwal</label>
                <input type="datetime-local" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Instruktur</label>
                <input type="text" class="form-control" placeholder="Masukkan nama instruktur">
            </div>

        </div>

        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="/pembayaran" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
