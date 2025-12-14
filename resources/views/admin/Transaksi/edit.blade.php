@extends('admin.layout')

@section('title', 'Edit Transaksi')

@section('content')
<h2 class="text-white mb-4">Edit Transaksi</h2>

<form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $transaksi->user_id ? 'selected' : '' }}>
                    {{ $user->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Paket</label>
            <select name="paket_id" class="form-control" required>
                @foreach($pakets as $paket)
                <option value="{{ $paket->id }}" {{ $paket->id == $transaksi->paket_id ? 'selected' : '' }}>
                    {{ $paket->nama_paket }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Instruktur</label>
            <select name="instruktur_id" class="form-control" required>
                @foreach($instrukturs as $instruktur)
                <option value="{{ $instruktur->id }}" {{ $instruktur->id == $transaksi->instruktur_id ? 'selected' : '' }}>
                    {{ $instruktur->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Jadwal</label>
            <select name="jadwal_id" class="form-control" required>
                @foreach($jadwals as $jadwal)
                <option value="{{ $jadwal->id }}" {{ $jadwal->id == $transaksi->jadwal_id ? 'selected' : '' }}>
                    {{ $jadwal->tanggal1 }} {{ $jadwal->jam_mulai1 }} - {{ $jadwal->jam_selesai1 }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" value="{{ $transaksi->nama_paket }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Harga Paket</label>
            <input type="number" name="harga_paket" class="form-control" value="{{ $transaksi->harga_paket }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" value="{{ $transaksi->metode_pembayaran }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $transaksi->tanggal }}">
        </div>
    </div>

    <button class="btn btn-success mt-3">Update</button>
    <a href="{{ route('admin.transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
