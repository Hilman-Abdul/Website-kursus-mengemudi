@extends('admin.layout')

@section('title', 'Data Paket')

@section('content')

<h2 class="text-white mb-4">Data Paket</h2>

<div class="mb-3">
    <a href="/paket/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Paket
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama User</th>
            <th>Jenis Kelamin</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Pertemuan</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>

        {{-- Dummy data untuk frontend --}}
        @php
            $paket = [
                ['id'=>1,'user'=>'Budi Santoso','jk'=>'Laki-laki','paket'=>'Manual','harga'=>'150.000','pertemuan'=>'6x60 menit'],
                ['id'=>2,'user'=>'Siti Aminah','jk'=>'Perempuan','paket'=>'Matic','harga'=>'200.000','pertemuan'=>'6x80 menit'],
            ];
        @endphp

        @foreach ($paket as $p)
        <tr>
            <td>{{ $p['id'] }}</td>
            <td>{{ $p['user'] }}</td>
            <td>{{ $p['jk'] }}</td>
            <td>{{ $p['paket'] }}</td>
            <td>{{ $p['harga'] }}</td>
            <td>{{ $p['pertemuan'] }}</td>
            <td>
                <a href="/paket/{{ $p['id'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/paket/{{ $p['id'] }}/delete" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
