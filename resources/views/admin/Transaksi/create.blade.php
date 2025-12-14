@extends('admin.layout')

@section('title', 'Tambah Transaksi')

@section('content')
<h2 class="text-white mb-4">Tambah Transaksi</h2>

<form action="{{ route('admin.transaksi.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Paket</label>
            <select name="paket_id" class="form-control" required>
                <option value="">-- Pilih Paket --</option>
                @foreach($pakets as $paket)
                <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Instruktur</label>
            <select name="instruktur_id" class="form-control" required>
                <option value="">-- Pilih Instruktur --</option>
                @foreach($instrukturs as $instruktur)
                <option value="{{ $instruktur->id }}">{{ $instruktur->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Jadwal</label>
            <select name="jadwal_id" class="form-control" required>
                <option value="">-- Pilih Jadwal --</option>
                @foreach($jadwals as $jadwal)
                <option value="{{ $jadwal->id }}">
                    {{ $jadwal->tanggal1 }} {{ $jadwal->jam_mulai1 }} - {{ $jadwal->jam_selesai1 }}
                </option>
                @endforeach
            </select>
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
            <label>Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
    </div>

    <button class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
