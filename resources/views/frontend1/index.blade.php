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
          <input type="hidden" name="source" value="{{ request('source')}}">
          <input type="hidden" name="source" value="{{ request('jenis')}}">

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
        <h2 class="title">Sign up</h2>

        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="input-box">
            <input type="text" name="nama" placeholder="Name" required>
          </div>

          <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
          </div>

          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
          </div>

          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
          </div>

          <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
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
</body>
</html>
