@extends('admin.layout')

@section('title', 'Edit Instruktur')

@section('content')

<h2 class="text-white mb-4">Edit Instruktur</h2>

<form action="{{ route('admin.instruktur.update', $instruktur->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">

    <div class="col-md-6 mb-3">
        <label>Nama</label>
        <input value="{{ $instruktur->nama }}" type="text" class="form-control" name="nama">
    </div>

    <div class="col-md-6 mb-3">
        <label>No HP</label>
        <input value="{{ $instruktur->no_hp }}" type="text" class="form-control" name="no_hp">
    </div>

    <div class="col-md-6 mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="Laki-laki" {{ $instruktur->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $instruktur->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Keahlian</label>
        <select name="keahlian" class="form-control">
            <option value="Manual" {{ $instruktur->keahlian == 'Manual' ? 'selected' : '' }}>Manual</option>
            <option value="Matic" {{ $instruktur->keahlian == 'Matic' ? 'selected' : '' }}>Matic</option>
        </select>
    </div>

</div>

<button class="btn btn-success">Update</button>
<a href="{{ route('admin.instruktur.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
