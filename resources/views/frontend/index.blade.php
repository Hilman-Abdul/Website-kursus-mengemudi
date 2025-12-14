<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login & Sign up</title>
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ time() }}">
</head>
<body>
  
  <div class="container">

    <!-- Checkbox untuk toggle form -->
    <input type="checkbox" id="flip">
    <div class="cover"></div>

    <div class="forms">

      <!-- =============== LOGIN FORM =============== -->
      <div class="form-content login">
        <h2 class="title">Login</h2>

        <form action="{{ route('login') }}" method="POST">
          @csrf

          <!-- kirim info dari mana user membuka login -->
          <input type="hidden" name="login_source" value="{{ $source ?? '' }}">

          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
          </div>

          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
          </div>

          <div class="input-box button">
            <input type="submit" value="Login">
          </div>

          <div class="social-login">
            <p>Atau login dengan:</p>
            <div class="social-buttons">

              <a href="#" class="social-btn google">
                <img src="{{ asset('images/google1.png') }}">
                Google
              </a>

              <a href="#" class="social-btn facebook">
                <img src="{{ asset('images/fb.png') }}">
                Facebook
              </a>

              <a href="#" class="social-btn instagram">
                <img src="{{ asset('images/ig.png') }}">
                Instagram
              </a>

            </div>
          </div>

          <div class="text">
            Belum punya akun?
            <label for="flip" class="switch">Sign up disini</label>
          </div>
        </form>
      </div>

      <!-- =============== REGISTER FORM =============== -->
      <div class="form-content register">
        @if ($errors->any())
  <div style="color:red; margin-bottom:10px;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

        <h2 class="title">Sign up</h2>

        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="input-box">
            <input type="text" name="nama" placeholder="Nama" required>
          </div>

          <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
          </div>

          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="input-box">
           <input type="password" id="password_confirmation"
                  name="password_confirmation"
                  placeholder="Konfirmasi Password" required>
           
           <small id="passwordError" style="color:red; display:none;">
             Password tidak sama
           </small>
           </div>

          <div class="input-box button">
            <input type="submit" value="Sign up">
          </div>

          <div class="text">
            Sudah punya akun?
            <label for="flip" class="switch">Login disini</label>
          </div>

        </form>
      </div>

    </div>
  </div>

  <script>
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('password_confirmation');
  const errorText = document.getElementById('passwordError');

  confirmPassword.addEventListener('input', function () {
    if (password.value !== confirmPassword.value) {
      errorText.style.display = 'block';
      confirmPassword.setCustomValidity('Password tidak sama');
    } else {
      errorText.style.display = 'none';
      confirmPassword.setCustomValidity('');
    }
  });
</script>

</body>
</html>
