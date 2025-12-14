@extends('admin.layout')

@section('title', 'Data Transaksi')

@section('content')
<h2 class="text-white mb-4">Data Transaksi</h2>

<a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Transaksi
</a>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Instruktur</th>
            <th>Metode Bayar</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->nama ?? '-' }}</td>
            <td>{{ $item->nama_paket }}</td>
            <td>{{ $item->harga_paket }}</td>
            <td>{{ $item->instruktur->nama ?? '-' }}</td>
            <td>{{ $item->metode_pembayaran }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>
                <a href="{{ route('admin.transaksi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.transaksi.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
