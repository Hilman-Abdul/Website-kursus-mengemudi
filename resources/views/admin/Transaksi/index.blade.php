@extends('admin.layout')

@section('title', 'Data Transaksi')

@section('content')

<h2 class="text-white mb-4">Data Transaksi</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Transaksi
    </a>
</div>

<table class="table table-dark table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th> <!-- Diubah dari Nama ke User ID -->
            <th>Paket</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Instruktur ID</th> <!-- Diubah dari Instruktur ke Instruktur ID -->
            <th>Metode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->user_id }}</td>         <!-- Menggunakan kolom user_id -->
            <td>{{ $t->nama_paket }}</td>
            <td>Rp{{ number_format($t->harga_paket, 0, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d M Y') }}</td>
            <td>{{ $t->instruktur_id }}</td>   <!-- Menggunakan kolom instruktur_id -->
            <td>{{ $t->metode_pembayaran }}</td>
            <td>
                <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection