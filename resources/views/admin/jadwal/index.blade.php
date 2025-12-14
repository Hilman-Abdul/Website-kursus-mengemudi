@extends('admin.layout')

@section('title', 'Data Jadwal')

@section('content')
<h2 class="text-white mb-4">Data Jadwal</h2>

<a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Jadwal
</a>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Tanggal 1</th>
            <th>Jam 1</th>
            <th>Tanggal 2</th>
            <th>Jam 2</th>
            <th>Gender User</th>
            <th>Jenis Paket</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jadwal as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->nama ?? '-' }}</td>
            <td>{{ $item->tanggal1 }}</td>
            <td>{{ $item->jam_mulai1 }} - {{ $item->jam_selesai1 }}</td>
            <td>{{ $item->tanggal2 ?? '-' }}</td>
            <td>{{ $item->jam_mulai2 ?? '-' }} - {{ $item->jam_selesai2 ?? '-' }}</td>
            <td>{{ $item->gender_user }}</td>
            <td>{{ $item->jenis_paket }}</td>
            <td>
                <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.jadwal.destroy', $item->id) }}" method="POST" style="display:inline">
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
