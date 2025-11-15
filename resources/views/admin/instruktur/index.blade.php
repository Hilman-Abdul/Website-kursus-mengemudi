@extends('admin.layout')

@section('title', 'Data Instruktur')

@section('content')

<h2 class="text-white mb-4">Data Instruktur</h2>

<div class="mb-3">
    <a href="/instruktur/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Instruktur
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Instruktur</th>
            <th>No Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Keahlian</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>

        {{-- Dummy data frontend --}}
        @php
            $instruktur = [
                ['id'=>1,'nama'=>'Andi Pratama','no_tlp'=>'08123456789','jk'=>'Laki-laki','keahlian'=>'manual'],
                ['id'=>2,'nama'=>'Siti Rahma','no_tlp'=>'082233445566','jk'=>'Perempuan','keahlian'=>'matic'],
            ];
        @endphp

        @foreach ($instruktur as $i)
        <tr>
            <td>{{ $i['id'] }}</td>
            <td>{{ $i['nama'] }}</td>
            <td>{{ $i['no_tlp'] }}</td>
            <td>{{ $i['jk'] }}</td>
            <td>{{ $i['keahlian'] }}</td>
            <td>
                <a href="/instruktur/{{ $i['id'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/instruktur/{{ $i['id'] }}/delete" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
