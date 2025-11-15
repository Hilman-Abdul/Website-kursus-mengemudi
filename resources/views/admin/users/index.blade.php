@extends('admin.layout')

@section('title', 'Data Users')

@section('content')

<h2 class="text-white mb-4">Data Users</h2>

<div class="mb-3">
    <a href="/users/create" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah User
    </a>
</div>

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>No Tlp</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th style="width:150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>

        {{-- Data Dummy dulu untuk Frontend --}}
        @php
            $users = [
                ['id'=>1,'nama'=>'Budi Santoso','username'=>'budi123','password'=>'123456','no_tlp'=>'08123456789','jk'=>'Laki-laki','email'=>'budi@email.com'],
                ['id'=>2,'nama'=>'Siti Aminah','username'=>'siti_04','password'=>'654321','no_tlp'=>'082233445566','jk'=>'Perempuan','email'=>'siti@email.com'],
            ];
        @endphp

        @foreach ($users as $u)
        <tr>
            <td>{{ $u['id'] }}</td>
            <td>{{ $u['nama'] }}</td>
            <td>{{ $u['username'] }}</td>
            <td>{{ $u['password'] }}</td>
            <td>{{ $u['no_tlp'] }}</td>
            <td>{{ $u['jk'] }}</td>
            <td>{{ $u['email'] }}</td>
            <td>
                <a href="/users/{{ $u['id'] }}/edit" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <a href="/users/{{ $u['id'] }}/delete" class="btn btn-danger btn-sm">
                    Hapus
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
