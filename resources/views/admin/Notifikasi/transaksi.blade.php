@extends('admin.layout')

@section('title', 'Transaksi Baru')

@section('content')

<h3>Transaksi</h3>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Paket</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    @foreach ($transaksi as $t)
    <tr>
        <td>{{ $t->nama }}</td>
        <td>{{ $t->nama_paket }}</td>
        <td>{{ number_format($t->harga_paket) }}</td>
        <td>{{ $t->created_at }}</td>
    </tr>
    @endforeach
</table>

@endsection
