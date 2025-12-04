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
                <ul class="m-0 ps-3">
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
                <input type="text" name="nama" value="{{ old('nama') }}" required placeholder=" ">
                <label>Nama Lengkap</label>
            </div>

            {{-- NIK --}}
            <div class="floating-box">
                <input type="number" name="nik" value="{{ old('nik') }}" required minlength="16" maxlength="16" placeholder=" ">
                <label>NIK</label>
            </div>

            {{-- Nomor HP --}}
            <div class="floating-box">
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder=" ">
                <label>No. Handphone</label>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Alamat --}}
            <div class="floating-box textarea-box">
                <textarea name="alamat" required placeholder=" ">{{ old('alamat') }}</textarea>
                <label>Alamat Lengkap</label>
            </div>

            {{-- Upload KTP --}}
            <div class="upload-box">
                <label class="upload-label">Upload / Scan KTP</label>
                <input type="file" name="foto" accept="image/*" capture="camera" required>
                <small>Bisa langsung foto dari kamera HP</small>
                <img id="previewKTP" class="preview-ktp">
            </div>


            {{-- Submit --}}
            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>

    </div>
</div>

<script>
document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
    const preview = document.getElementById('previewKTP');
    const file = e.target.files[0];

    if (file) {
        preview.style.display = 'block';
        preview.src = URL.createObjectURL(file);
    }
});
</script>

</body>
</html>
