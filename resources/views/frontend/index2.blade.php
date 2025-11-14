<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Pembayaran</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <style>
    body {
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
    }
    .struk {
      background: white;
      padding: 32px;
      border-radius: 18px;
      width: 420px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.15);
      text-align: center;
    }
    .struk h2 {
      margin-bottom: 16px;
    }
    .btn-back {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="struk">
  <h2>Bukti Pembayaran</h2>
  <p>Pembayaran telah berhasil.</p>
  <p>Terima kasih telah mempercayai layanan kami.</p>

  <a href="{{ route('frontend.dashboard') }}" class="btn btn-primary btn-back">Kembali ke Beranda</a>
</div>

</body>
</html>
