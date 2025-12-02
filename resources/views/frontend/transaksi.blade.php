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

    <div class="summary-box">
        <p><b>Nama:</b> {{ $user->name ?? 'Sandi' }}</p>
        <p><b>Nama Paket:</b> {{ $paket->nama ?? 'Paket Memperlancar manual' }}</p>
        <p><b>Harga:</b> Rp {{ number_format($paket->harga ?? 150000, 0, ',', '.') }}</p>
        <p><b>Pertemuan 1:</b> {{ $paket->tgl1 ?? '2025-01-01' }}</p>
        <p><b>Pertemuan 2:</b> {{ $paket->tgl2 ?? '2025-01-02' }}</p>
        <p><b>Instruktur:</b> {{ $paket->instruktur ?? 'Budi Rahman' }}</p>
    </div>

    <div class="section-title">E-Wallet</div>

    <div class="method-grid">
        <div class="method-card" onclick="selectMethod(this, 'GoPay')">
            <i class="bi bi-wallet2"></i>
            <div>GoPay</div>
        </div>

        <div class="method-card" onclick="selectMethod(this, 'Dana')">
            <i class="bi bi-wallet2"></i>
            <div>Dana</div>
        </div>

        <div class="method-card" onclick="selectMethod(this, 'OVO')">
            <i class="bi bi-wallet2"></i>
            <div>OVO</div>
        </div>
    </div>

    <div class="section-title">Bank Transfer</div>

    <div class="method-grid">
        <div class="method-card" onclick="selectMethod(this, 'BCA')">
            <i class="bi bi-bank"></i>
            <div>BCA</div>
        </div>

        <div class="method-card" onclick="selectMethod(this, 'Mandiri')">
            <i class="bi bi-bank"></i>
            <div>Mandiri</div>
        </div>

        <div class="method-card" onclick="selectMethod(this, 'BRI')">
            <i class="bi bi-bank"></i>
            <div>BRI</div>
        </div>
    </div>

    <button onclick="pay()">Bayar Sekarang</button>
</div>


<!-- STRUK POPUP -->
<div id="strukPopup">
    <div class="struk-box" id="printArea">
         <div class="struk-logo">
            <i class="bi bi-receipt-cutoff"></i>
        </div>

        <h3>Struk Pembayaran</h3>

        <div class="struk-item">
            <span class="struk-label">Nama:</span>
            <span class="struk-value" id="s_nama"></span>
        </div>

        <div class="struk-item">
            <span class="struk-label">Nama Paket:</span>
            <span class="struk-value" id="s_paket"></span>
        </div>

        <div class="struk-item">
            <span class="struk-label">Harga:</span>
            <span class="struk-value" id="s_harga"></span>
        </div>

        <div class="struk-item">
            <span class="struk-label">Pertemuan 1:</span>
            <span class="struk-value" id="s_tgl1"></span>
        </div>

        <div class="struk-item">
            <span class="struk-label">Pertemuan 2:</span>
            <span class="struk-value" id="s_tgl2"></span>
        </div>

        <div class="struk-item">
            <span class="struk-label">Instruktur:</span>
            <span class="struk-value" id="s_instruktur"></span>
        </div>

        <div class="struk-item">
            <span class="struk-label">Metode Pembayaran:</span>
            <span class="struk-value" id="s_metode"></span>
        </div>

        <button class="print-btn" onclick="printStruk()">Print Struk</button>

        <a href="{{ route('frontend.dashboard') }}">
            <button class="dashboard-btn">Kembali ke Dashboard</button>
        </a>
    </div>
</div>



<script>
    let selectedMethod = null;

    function selectMethod(card, method) {
        document.querySelectorAll('.method-card')
            .forEach(el => el.classList.remove('selected'));

        card.classList.add('selected');
        selectedMethod = method;
    }

    function pay() {
        if (!selectedMethod) {
            alert("Pilih metode pembayaran terlebih dahulu!");
            return;
        }

        // Isi struk
        document.getElementById("s_nama").innerText = "{{ $user->name ?? 'Nama Siswa' }}";
        document.getElementById("s_paket").innerText = "{{ $paket->nama ?? 'Paket Mengemudi' }}";
        document.getElementById("s_harga").innerText = "Rp {{ number_format($paket->harga ?? 150000,0,',','.') }}";
        document.getElementById("s_tgl1").innerText = "{{ $paket->tgl1 ?? '2025-01-01' }}";
        document.getElementById("s_tgl2").innerText = "{{ $paket->tgl2 ?? '2025-01-02' }}";
        document.getElementById("s_instruktur").innerText = "{{ $paket->instruktur ?? 'Budi Rahman' }}";
        document.getElementById("s_metode").innerText = selectedMethod;

        document.getElementById("strukPopup").style.display = "flex";
    }

    function printStruk() {
        const printContent = document.getElementById("printArea").innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;

        location.reload();
    }
</script>

</body>
</html>
