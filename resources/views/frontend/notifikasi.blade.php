<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to bottom, #C3F0FD 28%, #23A1C4 72%);
            margin: 0;
            padding: 0;
        }

        .container {
            background: white;
            width: 85%;
            margin: 40px auto;
            padding: 25px 30px;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin: 0 0 20px 0;
            font-size: 32px;
            font-weight: bold;
            color: #000;
        }

        .notif-box {
            border: 2px solid #d3d3d3;
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
            background: #fff;
        }

        .notif-box i {
            font-size: 40px;
            color: #7f7f7f;
        }

        .notif-content {
            flex: 1;
        }

        .notif-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .notif-text {
            font-size: 15px;
            color: #444;
        }

        .notif-btn {
            background: #0aa3e8;
            color: white;
            padding: 6px 18px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .notif-btn:hover {
            background: #067fb8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pesan</h2>

    <!-- Jadwal -->
    <div class="notif-box">
        <i class="bi bi-person-circle"></i>
        <div class="notif-content">
            <div class="notif-title">Jadwal Kursus</div>
              <div class="user-card" onclick="window.location='{{ route('info.user') }}'">
                 <h2>Halo, {{ Auth::user()->nama }}</h2>
                 <p>Terima kasih telah menggunakan layanan kami jadwal anda sudah di </p>
              </div>
        </div>
    </div>

    <!-- Transaksi -->
    <div class="notif-box">
        <i class="bi bi-person-circle"></i>
        <div class="notif-content">
            <div class="notif-title">Transaksi</div>
            <div class="notif-text">
                Terima kasih! Pembayaran Anda telah berhasil diproses.
            </div>
        </div>
    </div>

<a href="{{ route('rating.form') }}" style="text-decoration: none; color: inherit;">
    <div class="notif-box" style="cursor: pointer;">
        <i class="bi bi-person-circle"></i>

        <div class="notif-content">
            <div class="notif-title">Rating</div>
            <div class="notif-text">
                Terima kasih telah menggunakan layanan kami. Silakan beri rating.
            </div>
        </div>

        <button class="notif-btn">Nanti</button>
    </div>
</a>


</body>
</html>
