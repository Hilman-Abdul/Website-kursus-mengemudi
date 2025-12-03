@extends('admin.layout')

@section('title', 'Tambah Transaksi')

@section('content')

<h2 class="text-white mb-4">Tambah Transaksi</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Harga Paket</label>
            <input type="number" name="harga_paket" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Instruktur</label>
            <input type="text" name="instruktur" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" required>
        </div>
    </div>

    <button class="btn btn-primary mt-3">Simpan</button>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>

@endsection