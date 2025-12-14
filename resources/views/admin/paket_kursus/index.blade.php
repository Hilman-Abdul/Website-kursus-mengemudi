@extends('admin.layout')

@section('title', 'Data Paket Kursus')

@section('content')
<h2 class="text-white mb-4">Data Paket Kursus</h2>

<a href="{{ route('admin.paket_kursus.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Paket
</a>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Nama Paket</th>
            <th>Harga Paket</th>
            <th>Waktu Pertemuan</th>
            <th>Jenis Paket</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paket as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->nama ?? '-' }}</td>
            <td>{{ $item->nama_paket }}</td>
            <td>{{ $item->harga_paket }}</td>
            <td>{{ $item->waktu_pertemuan }}</td>
            <td>{{ ucfirst($item->jenis_paket) }}</td>
            <td>
                <a href="{{ route('admin.paket_kursus.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.paket_kursus.destroy', $item->id) }}" method="POST" style="display:inline">
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
