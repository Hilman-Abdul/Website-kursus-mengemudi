@extends('admin.layout')

@section('title', 'Data Rating')

@section('content')

<h2 class="text-white mb-4">Data Rating</h2>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Siswa</th>
            <th>Komentar</th>
            <th>Rating</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ratings as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->nama }}</td>
            <td>{{ $r->komentar }}</td>
            <td>{{ $r->rating }}</td>
            <td>{{ $r->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
