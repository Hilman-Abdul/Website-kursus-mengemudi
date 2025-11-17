@extends('admin.layout')

@section('title', 'Edit Paket')

@section('content')

<h2 class="text-white mb-4">Edit Paket</h2>

<div class="card p-4" style="background:#1f2937; color:white;">

    <form>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama User</label>
                <input value="Budi Santoso" type="text" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-control">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Nama Paket</label>
                <select class="form-control">
                    <option>Manual</option>
                    <option>Matic</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Harga Paket</label>
                <select class="form-control">
                    <option>150.000</option>
                    <option>200.000</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Pertemuan</label>
                <select class="form-control">
                    <option>6x60 menit</option>
                    <option>6x80 menit</option>
                </select>
            </div>

        </div>

        <button class="btn btn-success mt-3">Update</button>
        <a href="/paket" class="btn btn-secondary mt-3">Kembali</a>

    </form>

</div>

@endsection
