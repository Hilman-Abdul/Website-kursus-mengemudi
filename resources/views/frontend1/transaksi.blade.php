<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style7.css') }}">
</head>

<body>

<div class="pay-container">

    <div class="title">Pembayaran Paket</div>

    {{-- ============ RINGKASAN PEMBAYARAN ============ --}}
    <div class="summary-box">
        <p><b>Nama:</b> {{ $user->name }}</p>
        <p><b>Nama Paket:</b> {{ $paket->nama_paket }}</p>
        <p><b>Harga:</b> Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
        <p><b>Pertemuan 1:</b> {{ $jadwal->tanggal1 }}</p>
        <p><b>Pertemuan 2:</b> {{ $jadwal->tanggal2 ?? '-' }}</p>
        <p><b>Instruktur:</b> {{ $instruktur->nama }}</p>
    </div>


    {{-- ============ FORM SIMPAN TRANSAKSI ============ --}}
    <form action="{{ route('frontend.transaksi.simpan') }}" method="POST">
        @csrf

        <input type="hidden" name="instruktur_id" value="{{ $instruktur->id }}">
        <input type="hidden" name="metode" id="metode_pembayaran">


        {{-- ================= EWALLET ================= --}}
        <div class="section-title">E-Wallet</div>

        <div class="method-grid">
            <div class="method-card" onclick="selectMethod(this, 'GoPay')">
                <i class="bi bi-wallet2"></i><div>GoPay</div>
            </div>

            <div class="method-card" onclick="selectMethod(this, 'Dana')">
                <i class="bi bi-wallet2"></i><div>Dana</div>
            </div>

            <div class="method-card" onclick="selectMethod(this, 'OVO')">
                <i class="bi bi-wallet2"></i><div>OVO</div>
            </div>
        </div>


        {{-- ================= BANK ================= --}}
        <div class="section-title">Bank Transfer</div>

        <div class="method-grid">
            <div class="method-card" onclick="selectMethod(this, 'BCA')">
                <i class="bi bi-bank"></i><div>BCA</div>
            </div>

            <div class="method-card" onclick="selectMethod(this, 'Mandiri')">
                <i class="bi bi-bank"></i><div>Mandiri</div>
            </div>

            <div class="method-card" onclick="selectMethod(this, 'BRI')">
                <i class="bi bi-bank"></i><div>BRI</div>
            </div>
        </div>


        <button type="submit" class="pay-btn">Bayar Sekarang</button>
    </form>

</div>


<script>
    let selectedMethod = null;

    function selectMethod(card, method) {
        document.querySelectorAll('.method-card').forEach(el => el.classList.remove('selected'));
        card.classList.add('selected');

        selectedMethod = method;
        document.getElementById('metode_pembayaran').value = method;
    }
</script>

</body>
</html>
