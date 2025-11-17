@extends('admin.layout')

@section('title', 'Data Pembayaran')

@section('content')

<h2 class="text-white mb-4">Data Pembayaran</h2>

<div class="mb-3">
    <a href="/pembayaran/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Pembayaran
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama User</th>
            <th>Nama Paket</th>
            <th>Harga Paket</th>
            <th>Jadwal</th>
            <th>Instruktur</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>

        {{-- Dummy Data --}}
        @php
            $pembayaran = [
                [
                    'id' => 1,
                    'nama_user' => 'Budi Santoso',
                    'nama_paket' => 'Paket Matic 5x',
                    'harga' => 750000,
                    'jadwal' => '2025-11-20 09:00',
                    'instruktur' => 'Pak Dedi'
                ],
                [
                    'id' => 2,
                    'nama_user' => 'Siti Aminah',
                    'nama_paket' => 'Paket Manual 7x',
                    'harga' => 950000,
                    'jadwal' => '2025-11-22 14:00',
                    'instruktur' => 'Bu Rina'
                ],
            ];
        @endphp

        @foreach ($pembayaran as $p)
        <tr>
            <td>{{ $p['id'] }}</td>
            <td>{{ $p['nama_user'] }}</td>
            <td>{{ $p['nama_paket'] }}</td>
            <td>Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
            <td>{{ date('d M Y, H:i', strtotime($p['jadwal'])) }}</td>
            <td>{{ $p['instruktur'] }}</td>
            <td>
                <a href="/pembayaran/{{ $p['id'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/pembayaran/{{ $p['id'] }}/delete" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
