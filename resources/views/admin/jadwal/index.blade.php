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
            <th>User ID</th>
            <th>Paket</th>
            <th>Gender</th>
            <th>Tanggal 1</th>
            <th>Jam Mulai 1</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jadwal as $j)
        <tr>
            <td>{{ $j->id }}</td>
            <td>{{ $j->user_id }}</td>
            <td>{{ $j->jenis_paket }}</td>
            <td>{{ $j->gender_user }}</td>
            <td>{{ $j->tanggal1 }}</td>
            <td>{{ $j->jam_mulai1 }}</td>
            <td>
                <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                
                <form action="{{ route('jadwal.destroy', $j->id) }}" 
                      method="POST" 
                      style="display:inline">
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