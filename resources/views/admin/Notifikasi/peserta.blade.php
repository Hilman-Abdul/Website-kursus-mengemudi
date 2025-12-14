@extends('admin.layout')

@section('title', 'Peserta Baru')

@section('content')

<h3>Peserta</h3>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Daftar</th>
    </tr>
    @foreach ($peserta as $p)
    <tr>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->created_at }}</td>
    </tr>
    @endforeach
</table>

@endsection
