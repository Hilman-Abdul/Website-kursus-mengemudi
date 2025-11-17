@extends('admin.layout')

@section('title', 'Data Jadwal')

@section('content')

<h2 class="text-white mb-4">Data Jadwal</h2>

<div class="mb-3">
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Jadwal
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama User</th>
            <th>Paket</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $j['id'] }}</td>
            <td>{{ $j['nama'] }}</td>
            <td>{{ $j['paket'] }}</td>
            <td>{{ $j['jam'] }}</td>
            <td>{{ $j['tanggal'] }}</td>
            <td>
                <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <a href="{{ route('jadwal.destroy', $item->id) }}" class="btn btn-danger btn-sm">
                    Hapus
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
