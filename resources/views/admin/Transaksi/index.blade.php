@extends('admin.layout')

@section('title', 'Data Transaksi')

@section('content')

<h2 class="text-white mb-4">Data Transaksi</h2>

<div class="mb-3">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Transaksi
    </a>
</div>

<table class="table table-dark table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Paket</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Instruktur</th>
            <th>Metode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->nama }}</td>
            <td>{{ $t->nama_paket }}</td>
            <td>{{ $t->harga_paket }}</td>
            <td>{{ $t->tanggal }}</td>
            <td>{{ $t->instruktur }}</td>
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