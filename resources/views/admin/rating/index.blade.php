@extends('admin.layout')

@section('title', 'Data Rating')

@section('content')

<h2 class="text-white mb-4">Data Rating</h2>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Komentar</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ratings as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->user_id }}</td>
            <td>{{ $r->komentar }}</td>
            <td>{{ $r->pekerjaan }}</td>
            <td>
                <form action="{{ route('admin.rating.destroy', $r->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin hapus rating ini?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
