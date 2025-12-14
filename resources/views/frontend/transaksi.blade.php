<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style7.css') }}">

    <style>
        /* OVERLAY */
        .payment-overlay{
            position:fixed;
            top:0; left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,.6);
            display:flex;
            justify-content:center;
            align-items:center;
            z-index:9999;
        }
        .payment-box{
            background:#fff;
            padding:30px;
            border-radius:16px;
            text-align:center;
            width:330px;
        }
        .barcode-img{
            width:200px;
            margin:15px auto;
        }
        .success-img{
            width:180px;
            margin-bottom:15px;
        }
    </style>
</head>

<body>

<div class="pay-container">

    <div class="title">Pembayaran Paket</div>

    <!-- RINGKASAN -->
    <div class="summary-box">
        <p><b>Nama:</b> {{ $user->nama }}</p>
        <p><b>Paket:</b> {{ $paket->nama_paket }}</p>
        <p><b>Harga:</b> Rp {{ number_format($paket->harga_paket,0,',','.') }}</p>
        <p><b>Pertemuan 1:</b> {{ $jadwal->tanggal1 }} ({{ $jadwal->jam_mulai1 }} - {{ $jadwal->jam_selesai1 }})</p>
        <p><b>Pertemuan 2:</b> {{ $jadwal->tanggal2 ?? '-' }}</p>
        <p><b>Instruktur:</b> {{ $instruktur->nama }}</p>
    </div>

    <!-- FORM TRANSAKSI -->
    <form action="{{ route('transaksi.store') }}" method="POST" id="formBayar">
        @csrf

        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="paket_id" value="{{ $paket->id }}">
        <input type="hidden" name="instruktur_id" value="{{ $instruktur->id }}">
        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
        <input type="hidden" name="metode_pembayaran" id="metodePembayaran">

        <h2 class="section-title">Metode Pembayaran</h2>

        <div class="method-grid">
            <div class="method-card" onclick="selectMethod(this,'GoPay')">GoPay</div>
            <div class="method-card" onclick="selectMethod(this,'Dana')">Dana</div>
            <div class="method-card" onclick="selectMethod(this,'OVO')">OVO</div>
            <div class="method-card" onclick="selectMethod(this,'BCA')">BCA</div>
            <div class="method-card" onclick="selectMethod(this,'Mandiri')">Mandiri</div>
            <div class="method-card" onclick="selectMethod(this,'BRI')">BRI</div>
        </div>

        <button type="button" class="pay-btn" onclick="prosesPembayaran()">
            Bayar Sekarang
        </button>
    </form>
</div>

<!-- ================= OVERLAY PEMBAYARAN ================= -->
<div id="paymentOverlay" class="payment-overlay" style="display:none;">

    <!-- STEP 1 BARCODE -->
    <div id="stepBarcode" class="payment-box">
        <h4>Scan Barcode Pembayaran</h4>
        <img src="{{ asset('images/barcode.jpeg') }}" class="barcode-img">
        <p>Menunggu pembayaran...</p>
    </div>

    <!-- STEP 2 BERHASIL -->
    <div id="stepSuccess" class="payment-box" style="display:none;">
        <img src="{{ asset('images/succes.jpeg') }}" class="success-img">
        <h4>Pembayaran Berhasil</h4>
    </div>

</div>

<!-- ================= POPUP STRUK ================= -->
@if(session('success'))
<div id="strukPopup" style="display:flex;">
@else
<div id="strukPopup">
@endif

    <div class="struk-box" id="printArea">
        <h3>Struk Pembayaran</h3>

        <p><b>Nama:</b> {{ $user->nama }}</p>
        <p><b>Paket:</b> {{ $paket->nama_paket }}</p>
        <p><b>Harga:</b> Rp {{ number_format($paket->harga_paket,0,',','.') }}</p>
        <p><b>Instruktur:</b> {{ $instruktur->nama }}</p>
        <p><b>Metode:</b> {{ session('success.metode') }}</p>
        <p><b>Pertemuan 1:</b> {{ $jadwal->tanggal1 }}</p>
        <p><b>Pertemuan 2:</b> {{ $jadwal->tanggal2 ?? '-' }}</p>

        <button onclick="printStruk()" class="pay-btn-print">
            <i class="bi bi-printer"></i> Print Struk
        </button>

        <a href="{{ route('frontend.dashboard') }}" class="btn-dashboard">
            Kembali ke Dashboard
        </a>
    </div>
</div>

<!-- ================= JAVASCRIPT ================= -->
<script>
function selectMethod(el, metode){
    document.querySelectorAll('.method-card').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('metodePembayaran').value = metode;
}

function prosesPembayaran(){

    let metode = document.getElementById("metodePembayaran").value;
    if(!metode){
        alert("Pilih metode pembayaran terlebih dahulu");
        return;
    }

    document.getElementById("paymentOverlay").style.display = "flex";

    // barcode → sukses
    setTimeout(() => {
        document.getElementById("stepBarcode").style.display = "none";
        document.getElementById("stepSuccess").style.display = "block";
    }, 3000);

    // sukses → submit
    setTimeout(() => {
        document.getElementById("formBayar").submit();
    }, 5000);
}

function printStruk(){
    let isi = document.getElementById("printArea").innerHTML;
    let asli = document.body.innerHTML;

    document.body.innerHTML = isi;
    window.print();
    document.body.innerHTML = asli;
    location.reload();
}
</script>

</body>
</html>
