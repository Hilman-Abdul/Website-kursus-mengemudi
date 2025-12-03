@extends('admin.layout')

@section('title', 'Tambah Jadwal')

@section('content')

<h2 class="text-white mb-4">Tambah Jadwal</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form action="{{ route('jadwal.store') }}" method="POST">
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
            <label>Jam</label>
            <input type="time" name="jam" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
    </div>

    <button class="btn btn-primary mt-3">Simpan</button>
    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>

@endsection
