@extends('admin.layout')

@section('title', 'Data Users')

@section('content')
<h2 class="text-white mb-4">Data Users</h2>

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Tambah User
</a>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>No HP</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->alamat }}</td>
            <td>
                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display:inline">
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
