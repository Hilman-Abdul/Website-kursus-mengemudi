<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rating</title>

    <link rel="stylesheet" href="{{ asset('css/style9.css') }}">
</head>

<body>

<section class="rating-form-section">
    <div class="rating-container">

        <h2 class="rating-title">Beri Rating Anda</h2>

        <!-- Pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 10px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rating.store') }}" method="POST" class="rating-form">
            @csrf

            <!-- user_id untuk disimpan ke database -->
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <div class="rating-form-group">
                <label>Nama Anda</label>
                <input type="text" value="{{ Auth::user()->nama }}" disabled>
            </div>

            <div class="rating-form-group">
                <label>Komentar</label>
                <textarea name="komentar" required></textarea>
            </div>

            <div class="rating-form-group">
                <label>Pekerjaan (opsional)</label>
                <input type="text" name="pekerjaan" placeholder="Mahasiswa, Karyawan, dll">
            </div>

            <button type="submit" class="rating-btn">Kirim Rating</button>
        </form>

    </div>
</section>

</body>
</html>
