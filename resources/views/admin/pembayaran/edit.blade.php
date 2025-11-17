@extends('admin.layout')

@section('title', 'Edit Pembayaran')

@section('content')

<h2 class="text-white mb-4">Edit Pembayaran</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama User</label>
                <input type="text" class="form-control" value="Budi Santoso">
            </div>

            <div class="col-md-6 mb-3">
                <label>Nama Paket</label>
                <input type="text" class="form-control" value="Paket Matic 5x">
            </div>

            <div class="col-md-6 mb-3">
                <label>Harga Paket</label>
                <input type="number" class="form-control" value="750000">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jadwal</label>
                <input type="datetime-local" class="form-control" value="2025-11-20T09:00">
            </div>

            <div class="col-md-6 mb-3">
                <label>Instruktur</label>
                <input type="text" class="form-control" value="Pak Dedi">
            </div>

        </div>

        <button class="btn btn-success mt-3">Update</button>
        <a href="/pembayaran" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
