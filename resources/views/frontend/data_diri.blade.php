<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi Data Diri</title>
    <link rel="stylesheet" href="{{ asset('css/style6.css') }}">
</head>
<body>

<div class="container">
  <div class="form-card">

      @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
      @endif

      <h3 class="title">Lengkapi Data Diri</h3>

      <form action="{{ route('data.simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="floating-box">
          <input type="text" name="nama" placeholder=" " required>
          <label>Nama Lengkap</label>
        </div>

        <div class="floating-box">
          <input type="number" name="nik" placeholder=" " minlength="16" maxlength="16" required>
          <label>NIK</label>
        </div>

        <div class="floating-box">
          <input type="text" name="ttl" placeholder=" " required>
          <label>Tempat & Tanggal Lahir</label>
        </div>

        <div class="floating-box">
          <input type="text" name="no_hp" placeholder=" " required>
          <label>No. Handphone</label>
        </div>

        <div class="floating-box textarea-box">
          <textarea name="alamat" placeholder=" " required></textarea>
          <label>Alamat Lengkap</label>
        </div>

        <div class="upload-box">
          <label class="upload-label">Upload / Scan KTP</label>
          <input type="file" name="ktp" accept="image/*" capture="camera" required>
          <small>Kamu bisa langsung foto dari kamera HP</small>
        </div>

        <button type="submit" class="btn-submit">Simpan Data</button>

      </form>

  </div>
</div>

</body>
</html>
