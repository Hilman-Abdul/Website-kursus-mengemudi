@extends('admin.layout')

@section('title', 'Data Paket')

@section('content')

<h2 class="text-white mb-4">Data Paket</h2>

<div class="mb-3">
    <a href="{{ route('paket_kursus.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Paket
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Nama Paket</th>
            <th>Harga Paket</th>
            <th>Waktu Pertemuan</th> <!-- Diubah labelnya -->
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paket as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->user_id }}</td>
            <td>{{ $p->nama_paket }}</td>
            <td>{{ $p->harga_paket }}</td>
            <td>{{ $p->waktu_pertemuan }}</td> <!-- FIXED: Panggil kolom yang benar -->
            <td>
                <a href="{{ route('paket_kursus.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('paket_kursus.destroy', $p->id) }}" 
                      method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" 
                            class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection