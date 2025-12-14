@extends('admin.layout')

@section('title', 'Edit Jadwal')

@section('content')

<h2 class="text-white mb-4">Edit Jadwal</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama</label>
            <input name="nama" value="{{ $jadwal->nama }}" type="text" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nama Paket</label>
            <input name="nama_paket" value="{{ $jadwal->nama_paket }}" type="text" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Jam</label>
            <input name="jam" value="{{ $jadwal->jam }}" type="time" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Tanggal</label>
            <input name="tanggal" value="{{ $jadwal->tanggal }}" type="date" class="form-control" required>
        </div>
    </div>

    <button class="btn btn-success mt-3">Update</button>
    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>

@endsection
