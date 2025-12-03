@extends('admin.layout')

@section('title', 'Data Rating')

@section('content')

<h2 class="text-white mb-4">Data Rating</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Siswa</th>
            <th>Komentar</th>
            <th>Pekerjaan</th> <!-- Kita asumsikan ini yang kamu maksud 'Rating' di header, karena kolom migrasi bernama 'pekerjaan' -->
            <th>Tanggal Dibuat</th>
            <th>Aksi</th> <!-- Tambah kolom Aksi untuk Hapus -->
        </tr>
    </thead>
    <tbody>
        @foreach($ratings as $r)
        <tr>
            <td>{{ $r->id }}</td>
            {{-- Menggunakan relasi user() untuk mendapatkan nama siswa. Asumsi User model punya kolom 'name' --}}
            <td>{{ $r->user->name ?? 'User Dihapus' }}</td> 
            <td>{{ $r->komentar }}</td>
            <td>{{ $r->pekerjaan }}</td> 
            <td>{{ $r->created_at->format('d-m-Y H:i') }}</td>
            <td>
                {{-- Form Hapus --}}
                <form action="{{ route('rating.destroy', $r->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus rating ini?')" 
                            class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection