<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
    

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/pendaftaran.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
<div class="nav-logo">
            <a href="#home">
    <img src="{{ asset('img/icon.jpeg') }}" alt="logo" class="logo-icon">
    </a>
    </div>

    <div class="navbar-right">
        <a href="/" id="login"><i data-feather="home"></i></a>
    </div>
</nav>

<!-- daftar section -->
<section class="home">
    <div class="daftar">
        <h1>Daftar</h1>
        <!-- Add form action -->
        <form action="{{ route('pendaftar.store') }}" method="POST">
            @csrf
            <div class="input-box">
                <span class="icon"><i data-feather="mail"></i></span>
                <input type="email" name="email" required />
                <label>Masukkan Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><i data-feather="user"></i></span>
                <input type="text" name="name" required />
                <label>Masukkan Nama Lengkap</label>
            </div>
            <div class="input-box">
                <span class="icon"><i data-feather="phone"></i></span>
                <input type="text" name="phone_number" required />
                <label>Masukkan Nomor Telepon</label>
            </div>
            <div class="input-box">
                <span class="icon"><i data-feather="lock"></i></span>
                <input type="password" name="password" required />
                <label>Masukkan password</label>
            </div>
            <div class="input-box">
                <span class="icon"><i data-feather="lock"></i></span>
                <input type="password" name="password_confirmation" required />
                <label>Masukkan kembali password</label>
            </div>
            <button type="submit" class="btn">Daftar</button>
        </form>

        <!-- Display success message if available -->
        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error messages -->
        @if($errors->any())
            <div style="color: red;">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Feather Icons -->
<script>
    feather.replace();
</script>
</body>
</html>