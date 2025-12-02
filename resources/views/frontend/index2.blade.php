<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ time() }}">
</head>
<body>
  <div class="container">

    <div class="forms">

      <!-- =============== LOGIN FORM ONLY =============== -->
      <div class="form-content login">
        <h2 class="title">Login Admin</h2>

        <form action="{{ route('admin.login') }}" method="POST">
          @csrf

          <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
          </div>

          <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
          </div>

          <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
          </div>

          <div class="input-box button">
            <input type="submit" value="Login">
          </div>

        </form>
      </div>

    </div>
  </div>
</body>
</html>
