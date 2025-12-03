@extends('admin.layout')

@section('title', 'Data Instruktur')

@section('content')

<h2 class="text-white mb-4">Data Instruktur</h2>

<div class="mb-3">
    <a href="{{ route('instruktur.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Instruktur
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Jenis Kelamin</th>
            <th>Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($instrukturs as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->nama }}</td>
            <td>{{ $i->no_hp }}</td>
            <td>{{ $i->jenis_kelamin }}</td>
            <td>{{ $i->keahlian }}</td>

            <td>
                <a href="{{ route('instruktur.edit', $i->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('instruktur.destroy', $i->id) }}" method="POST" style="display:inline;">
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
