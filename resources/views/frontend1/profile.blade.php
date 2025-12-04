<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style10.css') }}">
</head>

<body>

<div class="container mt-5 pt-4">
    <div class="profile-wrapper">
        <div class="card p-4 shadow-lg custom-card">

            <h3 class="mb-4 text-center">Profil Saya</h3>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form action="{{ route('frontend.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- WRAPPER FLEX -->
                <div class="profile-flex">

                    <!-- FOTO DI SEBELAH KIRI -->
                    <div class="profile-left text-center">
                        <img src="{{ asset('images/user.jpg') }}" width="150" height="150"
                             class="rounded profile-photo mb-3">

                        <input type="file" class="form-control" name="foto">
                    </div>

                    <!-- INPUTAN DI SEBELAH KANAN -->
                    <div class="profile-right">

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                        </div>

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                    </div>

                </div>

                <button class="btn w-100 custom-primary mt-3">Update Profil</button>

            </form>

            <hr>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn w-100 custom-danger">Logout</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
