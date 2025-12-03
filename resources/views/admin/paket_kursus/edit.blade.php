@extends('admin.layout')

@section('title', 'Edit Paket')

@section('content')

<h2 class="text-white mb-4">Edit Paket</h2>

<div class="card p-4" style="background:#1f2937; color:white;">

    <form action="{{ route('paket_kursus.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama</label>
                <input name="nama" value="{{ $paket->nama }}" 
                       type="text" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Nama Paket</label>
                <input name="nama_paket" value="{{ $paket->nama_paket }}" 
                       type="text" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Harga Paket</label>
                <input name="harga_paket" value="{{ $paket->harga_paket }}" 
                       type="number" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Waktu</label>
                <input name="waktu" value="{{ $paket->waktu }}" 
                       type="text" class="form-control" required>
            </div>

        </div>

        <button class="btn btn-success mt-3">Update</button>
        <a href="{{ route('paket_kursus.index') }}" class="btn btn-secondary mt-3">Kembali</a>

    </form>

</div>

@endsection