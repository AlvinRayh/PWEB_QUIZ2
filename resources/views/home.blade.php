<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
    

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script src = "{{ asset('js/alpineUser.js') }}"></script>

    

</head>
<body>

<!-- Navbar -->
    <nav class = "navbar">
        <div class="nav-logo">
            <a href="#home">
    <img src="{{ asset('img/icon.jpeg') }}" alt="logo" class="logo-icon">
    </a>
    </div>

    <div class="navbar-mid">
    <a href="#menu">Menu</a>
    </div>

    <div class="navbar-right">
    <a href="/login" id = "login"><i data-feather = "user"></i></a>
    </div>
    </nav>
<!-- isi tengah -->
    <section class = "hero" id = "home">
        <main class = "content"> 
            <h1>Waktunya Bersantai dengan Secangkir <span>Kopi</span></h1>
            <p>Ambil jeda sejenak dan nikmati waktu bersantai bersama kopi pilihan Anda.</p>
            <a href="/login" class = "cta">Buy Now</a>
        </main>
    </section>

    <section class="date-message">
    <div class="date-container">
        <h2 id="current-date"></h2>
        <p id="daily-message"></p>
    </div>
</section>

<script>
    // Fungsi untuk mendapatkan nama hari
    const getDayName = (dayNumber) => {
        const days = [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        ];
        return days[dayNumber];
    };

    // Fungsi untuk mendapatkan pesan harian
    const getDailyMessage = (dayNumber) => {
        const messages = {
            0: "Nikmati akhir pekan dengan kopi terbaik kami!",
            1: "Senin penuh semangat! Mulai minggu Anda dengan secangkir kopi.",
            2: "Selasa santai. Nikmati kopi favorit Anda!",
            3: "Rabu produktif! Jangan lupa istirahat sejenak dengan kopi.",
            4: "Kamis ceria. Kopi kita siap menemani hari Anda.",
            5: "Jumat bahagia! Nikmati akhir pekan bersama kopi terbaik.",
            6: "Sabtu santai. Saatnya bersantai dengan secangkir kopi."
        };
        return messages[dayNumber] || "Selamat menikmati hari Anda dengan kopi!";
    };

    // Mendapatkan tanggal dan hari saat ini
    const now = new Date();
    const dayName = getDayName(now.getDay());
    const currentDate = `${dayName}, ${now.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    })}`;

    // Update elemen HTML
    document.getElementById('current-date').textContent = `Hari ini: ${currentDate}`;
    document.getElementById('daily-message').textContent = getDailyMessage(now.getDay());
</script>


       <!-- Menu -->
       <section class="menu" id="menu" x-data="products">
    <h1>Menu</h1>
    <h2>Coffee</h2>
    <div class="row">
        <template x-for="(item, index) in coffeeItems()" x-key="index">
        <div class="menu-card">
            <img :src="`{{ asset('img/${item.img}') }}`" :alt="item.name" class = "menu-card-img">
            <h3 class = "menu-card-title" x-text="item.name"></h3>
        </div>
        </template>
        
    </div>
<!-- non coffee -->
    <h2>Non Coffee</h2>
    <div class="row">
        <template x-for="(item, index) in nonCoffeeItems" x-key="index">
        <div class="menu-card">
            <img :src="`{{ asset('img/${item.img}') }}`" :alt="item.name" class = "menu-card-img">
            <h3 class = "menu-card-title" x-text="item.name"></h3>
        </div>
        </template>
        
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="social-links">
            <a href="https://www.instagram.com/kopikita_a?igsh=b2hsM3g5ZDNzZDQy" target="_blank">Instagram</a> |
            <a href="https://www.facebook.com/youraccount" target="_blank">Facebook</a> |
            <a href="https://twitter.com/youraccount" target="_blank">Twitter</a>
        </div>
        
        <div class="contact-info">
            <p>Email: <a href="mailto:info@kopikita.com">kopikita@gmail.com</a></p>
            <p>Phone: +62 812-5390-1839</p>
        </div>
    </div>
</footer>

<!-- feather Icons   -->
<script>
      feather.replace();
    </script>
</body>
</html>