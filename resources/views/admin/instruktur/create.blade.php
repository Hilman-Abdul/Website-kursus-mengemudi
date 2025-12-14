@extends('admin.layout')

@section('title', 'Tambah Instruktur')

@section('content')

<h2 class="text-white mb-4">Tambah Instruktur</h2>

<form action="{{ route('admin.instruktur.store') }}" method="POST">
@csrf

<div class="row">

    <div class="col-md-6 mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Keahlian</label>
        <select name="keahlian" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Manual">Manual</option>
            <option value="Matic">Matic</option>
        </select>
    </div>

</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('admin.instruktur.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
