<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Data Diri</title>
    <link rel="stylesheet" href="{{ asset('css/style6.css') }}">
</head>
<body>

<div class="container">
    <div class="form-card">

        {{-- Alert Berhasil --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3 class="title">Lengkapi Data Diri</h3>

        <form action="{{ route('data.simpan') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div class="floating-box">
                <input type="text" name="nama" value="{{ old('nama') }}" placeholder=" " required>
                <label>Nama Lengkap</label>
            </div>

            {{-- NIK --}}
            <div class="floating-box">
                <input type="number" name="nik" value="{{ old('nik') }}" placeholder=" " minlength="16" maxlength="16" required>
                <label>NIK</label>
            </div>

            {{-- No HP --}}
            <div class="floating-box">
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder=" " required>
                <label>No. Handphone</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>


            {{-- Alamat --}}
            <div class="floating-box textarea-box">
                <textarea name="alamat" placeholder=" " required>{{ old('alamat') }}</textarea>
                <label>Alamat Lengkap</label>
            </div>

            {{-- Upload KTP --}}
            <div class="upload-box">
                <label class="upload-label">Upload / Scan KTP</label>
                <input type="file" name="foto" accept="image/*" capture="camera" required>
                <small>Bisa langsung foto dari kamera HP</small>
            </div>

            {{-- Button --}}
            <button type="submit" class="btn-submit">Simpan Data</button>

        </form>

    </div>
</div>

</body>
</html>
