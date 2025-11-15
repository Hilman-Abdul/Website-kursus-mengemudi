@extends('admin.layout')

@section('title', 'Edit Instruktur')

@section('content')

<h2 class="text-white mb-4">Edit Instruktur</h2>

<div class="card p-4" style="background:#1f2937; color:white;">
    <form>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Instruktur</label>
                <input value="Andi Pratama" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>No Telepon</label>
                <input value="08123456789" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-control">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>keahlian</label>
                <select class="form-control">
                    <option>Manual</option>
                    <option>Manual</option>
                </select>
            </div>

        </div>

        <button class="btn btn-success mt-3">Update</button>
        <a href="/instruktur" class="btn btn-secondary mt-3">Kembali</a>

    </form>
</div>

@endsection
