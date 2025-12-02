<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal Kursus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
</head>
<body>

<div class="container mt-5" style="max-width: 700px;">

    <div class="calendar-wrapper">

        <h3 class="calendar-header" id="bulanTahun"></h3>

        <div class="calendar-grid" id="calendarGrid"></div>

        <p class="text-center mt-3" id="tanggalLabel">Belum memilih tanggal</p>

        <!-- FORM JADWAL -->
        <form action="{{ route('jadwal.store') }}" method="POST" class="mt-3">
            @csrf

            <!-- TANGGAL (diisi oleh JavaScript) -->
            <input type="hidden" id="tanggal1" name="tanggal1">
            <input type="hidden" id="tanggal2" name="tanggal2">

            <label class="form-label text-center w-100">Jam Kursus</label>

            <div class="row justify-content-center">

                <!-- JAM HARI 1 -->
                <div class="col-6">
                    <div class="time-box">
                        <label class="form-label w-100 text-center">Jam Kursus Hari 1</label>

                        <input type="time" 
                               name="jam_mulai1" 
                               id="jamMulai1" 
                               class="form-control"
                               onchange="setTime(1)"
                               required>

                        <input type="hidden" name="jam_selesai1" id="jamSelesai1">
                        <div id="outputJam1" class="mt-2 text-center"></div>
                    </div>
                </div>

                <!-- JAM HARI 2 -->
                <div class="col-6">
                    <div class="time-box">
                        <label class="form-label w-100 text-center">Jam Kursus Hari 2 (Opsional)</label>

                        <input type="time" 
                               name="jam_mulai2" 
                               id="jamMulai2" 
                               class="form-control"
                               onchange="setTime(2)">

                        <input type="hidden" name="jam_selesai2" id="jamSelesai2">
                        <div id="outputJam2" class="mt-2 text-center"></div>
                    </div>
                </div>
            </div>

            <!-- JENIS PAKET -->
            <div class="mt-3">
                <label class="form-label">Jenis Paket</label>
                <select name="jenis_paket" class="form-select" required>
                    <option value="">-- pilih --</option>
                    <option value="manual">Manual</option>
                    <option value="matic">Matic</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">

                <a href="{{ route('paket.batal') }}" class="btn btn-danger small-btn">Kembali</a>

                <button type="submit" class="btn btn-primary small-btn">
                    Simpan Jadwal
                </button>

            </div>

        </form>

    </div>
</div>

<script src="{{ asset('js/style1.js') }}"></script>

</body>
</html>
