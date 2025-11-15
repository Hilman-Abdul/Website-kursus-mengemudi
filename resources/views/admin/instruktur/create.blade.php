@extends('admin.layout')

@section('title', 'Tambah Instruktur')

@section('content')

<h2 class="text-white mb-4">Tambah Instruktur</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama Instruktur</label>
                <input type="text" class="form-control" placeholder="Masukkan nama instruktur">
            </div>

            <div class="col-md-6 mb-3">
                <label>No Telepon</label>
                <input type="text" class="form-control" placeholder="Masukkan no telepon">
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
                <label>keahlian</label>
                <select class="form-control">
                    <option value="">-- pilih --</option>
                    <option>Matic</option>
                    <option>Manual</option>
                </select>
            </div>

        </div>

        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="/instruktur" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
