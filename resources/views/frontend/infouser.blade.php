<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jadwal Kursus</title>
  <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    min-height: 100vh;
    background: linear-gradient(to bottom, #C3F0FD 28%, #23A1C4 72%);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Container card */
.container {
    width: 90%;
    max-width: 700px;
    background: rgba(255, 255, 255, 0.85);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(4px);
}

/* Header title */
.header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    font-size: 22px;
    font-weight: bold;
    color: #3b3b3b;
}

.header i {
    font-size: 26px;
    color: #4e0fa6;
}

/* Content text */
.content {
    font-size: 17px;
    line-height: 1.7;
    color: #333;
}

  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      Jadwal Kursus
    </div>

    <div class="content">
    Halo {{ $user->nama }}, jadwal kursus mobil Anda telah ditetapkan:<br><br>

    - <b>Tanggal:</b> {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d/m/Y') }} <br>
    - <b>Waktu:</b> {{ $jadwal->jam_mulai1 }} <br>
    - <b>Lokasi:</b> Bukit Griya <br><br>

    Jangan lupa untuk mencatatnya. Sampai jumpa!
   </div>

  </div>
</body>
</html>
