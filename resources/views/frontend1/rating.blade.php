<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Rating</title>

    <!-- CSS External -->
    <link rel="stylesheet" href="css/style9.css">
</head>

<body>

<section class="rating-form-section">
    <div class="rating-container">

        <h2 class="rating-title">Beri Rating Anda</h2>

        <!-- Pesan sukses -->
        <div class="alert alert-success" style="display:none;">
            Rating berhasil dikirim!
        </div>

        <form action="#" method="POST" class="rating-form">

            <div class="rating-form-group">
                <label>Nama Anda</label>
                <input type="text" value="Nama User" disabled>
            </div>

            <div class="rating-form-group">
                <label>Komentar</label>
                <textarea name="komentar" required></textarea>
            </div>

            <div class="rating-form-group">
                <label>Pekerjaan (opsional)</label>
                <input type="text" name="pekerjaan" placeholder="Mahasiswa, Karyawan, dll">
            </div>

            <button class="rating-btn">Kirim Rating</button>
        </form>

    </div>
</section>

</body>
</html>
