<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"href="{{ asset('css/style7.css') }}">
  <title>Document</title>
</head>
<body>
  <section id="payment">
  <div class="payment-box">

    <h2 class="title">Pembayaran</h2>
    <p class="product-name">Paket Belajar Mengemudi</p>
    <h3 class="price">Rp 50.000</h3>

    <h4 class="choose">Pilih Metode E-Wallet</h4>

    <div class="wallet-list">
      <button class="wallet-btn" data-wallet="DANA">DANA</button>
      <button class="wallet-btn" data-wallet="OVO">OVO</button>
      <button class="wallet-btn" data-wallet="GoPay">GoPay</button>
      <button class="wallet-btn" data-wallet="ShopeePay">ShopeePay</button>
    </div>

    <div id="wallet-info" class="info hidden">
      <p class="method">Metode Pembayaran: <span id="wallet-name"></span></p>
      <p>Silakan kirim pembayaran ke nomor berikut:</p>
      <h3 class="number">08xx-xxxx-xxxx</h3>
      <button id="confirm" class="confirm">Saya Sudah Bayar</button>
    </div>

  </div>

  <!-- Modal -->
  <div id="successModal" class="modal">
    <div class="modal-box">
      <h2>Pembayaran Berhasil!</h2>
      <p>Transaksi diproses dengan sukses.</p>
      <button id="okBtn">OK</button>
    </div>
  </div>

</section>
 
<script>
  const walletBtns = document.querySelectorAll('.wallet-btn');
  const walletInfo = document.getElementById('wallet-info');
  const walletName = document.getElementById('wallet-name');

  walletBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      walletBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      walletName.textContent = btn.dataset.wallet;
      walletInfo.classList.remove('hidden');
    });
  });

  const confirmBtn = document.getElementById('confirm');
  const modal = document.getElementById('successModal');
  const ok = document.getElementById('okBtn');

  confirmBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
  });

  ok.addEventListener('click', () => {
    window.location.href = "{{ route('frontend.index2') }}";
  });
</script>

</body>
</html>