@extends('admin.layout')

@section('title', 'Tambah Paket')

@section('content')

<h2 class="text-white mb-4">Tambah Paket</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form action="{{ route('paket_kursus.store') }}" method="POST">
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
                <label>Waktu</label>
                <input type="text" name="waktu" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('paket_kursus.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>

@endsection