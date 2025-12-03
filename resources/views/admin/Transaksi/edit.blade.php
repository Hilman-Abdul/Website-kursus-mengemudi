@extends('admin.layout')

@section('title', 'Edit Transaksi')

@section('content')

<h2 class="text-white mb-4">Edit Transaksi</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
<form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $transaksi->nama }}" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" value="{{ $transaksi->nama_paket }}" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Harga Paket</label>
            <input type="number" name="harga_paket" value="{{ $transaksi->harga_paket }}" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Instruktur</label>
            <input type="text" name="instruktur" value="{{ $transaksi->instruktur }}" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" value="{{ $transaksi->metode_pembayaran }}" class="form-control" required>
        </div>
    </div>

    <button class="btn btn-success mt-3">Update</button>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>

@endsection