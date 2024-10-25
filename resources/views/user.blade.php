<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{ asset('css/user.css') }}">

    <!-- <script src="{{ asset('js/user.js') }}" defer></script> -->

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src = "{{ asset('js/alpineUser.js') }}" async></script>

    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-lGEeGpwh7Nl0tHsm"></script>

</head>
<body>

<!-- Navbar -->
    <nav class = "navbar" x-data>
    <div class="nav-logo">
    <img src="{{ asset('img/icon.jpeg') }}" alt="logo" class="logo-icon">
    </div>

    <div class="navbar-right">
        <a href="#" id = "shopping-cart-button">
            <i data-feather = "shopping-cart"></i>
            <span class="quantity-notif" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
        </a>
        <a href="#" id = "user-button"><i data-feather = "user"></i></a>
    </div>

<!-- user -->
 <div class="user">
    <a href="/"><i data-feather = "log-out"></i><span>  Logout</span></a>
 </div>


<!-- shopping-cart -->
    <div class="shopping-cart">
    <div class="scroll">
      <template x-for="(item, index) in $store.cart.items" x-keys="index">
        <div class="cart-items">
            <img :src="`{{ asset('img/${item.img}') }}`" :alt="item.name">
            <div class="item-detail">
            <h3 x-text="item.name"></h3>
                <div class="item-price">
                    <span x-text="rupiah(item.price)"></span> 
                    <button id="remove" @click="$store.cart.remove(item.id)" >&minus;</button>
                    <span x-text="item.quantity"></span>
                    <button id="add" @click="$store.cart.add(item)">&plus;</button> &equals;
                    <span x-text="rupiah(item.total)"></span>
                </div>
</template>

    <h4 x-show="!$store.cart.items.length" style = "margin-top: 1rem;">Keranjang Kopi Kamu Masih Kosong</h4>
    <h4 x-show="$store.cart.items.length">Total : <span x-text="rupiah($store.cart.total)"></span></h4>
<!-- checkout -->


<div class="form-container" x-show="$store.cart.items.length">
    <form action="" id="checkoutForm">
        <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)"> 
        <input type="hidden" name="total" x-model="$store.cart.total"> 
        <h5>Customer Detail</h5>

        <label for="name">
            <span>Name</span>
            <input type="text" name="name" id="name">
        </label>

        <label for="email">
            <span>Email</span>
            <input type="email" name="email" id="email">
        </label>

        <label for="phone">
            <span>Phone</span>
            <input type="number" name="phone" id="phone" autocomplete="off">
        </label>

        <button class="checkout-button disabled" type="submit" id="checkout-button" value="checkout">
            Checkout
        </button>
    </form>
</div>
</div>

    </nav>


    <!-- Menu -->
    <section class="menu" id="menu" x-data="products">
    <h1>Menu</h1>
    <h2>Coffee</h2>
    <div class="row">
        <template x-for="(item, index) in coffeeItems()" x-key="index">
        <div class="menu-card">
            <img :src="`{{ asset('img/${item.img}') }}`" :alt="item.name" class = "menu-card-img">
            <h3 class = "menu-card-title" x-text="item.name"></h3>
            <p class = "menu-card-price" x-text = "rupiah(item.price)"></p>
            <div class="menu-icons">
                <a href="#" class="menu-detail-button" @click.prevent="$store.cart.add(item)">
                <svg
  width="24"
  height="24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
>
  <use href="{{ asset('img/feather-sprite.svg#shopping-cart') }}" />
</svg>
                </a>
            </div>
        </div>
        </template>
        
    </div>
<!-- non coffee -->
    <h2>Non Coffee</h2>
    <div class="row">
        <template x-for="(item, index) in nonCoffeeItems()" x-key="index">
        <div class="menu-card">
            <img :src="`{{ asset('img/${item.img}') }}`" :alt="item.name" class = "menu-card-img">
            <h3 class = "menu-card-title" x-text="item.name"></h3>
            <p class = "menu-card-price" x-text = "rupiah(item.price)"></p>
            <div class="menu-icons">
                <a href="#" class="menu-detail-button" @click.prevent="$store.cart.add(item)">
                <svg
  width="24"
  height="24"
  fill="none"
  stroke="currentColor"
  stroke-width="2"
  stroke-linecap="round"
  stroke-linejoin="round"
>
  <use href="{{ asset('img/feather-sprite.svg#shopping-cart') }}" />
</svg>
                </a>
            </div>
        </div>
        </template>
        
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="social-links">
            <a href="https://www.instagram.com/youraccount" target="_blank">Instagram</a> |
            <a href="https://www.facebook.com/youraccount" target="_blank">Facebook</a> |
            <a href="https://twitter.com/youraccount" target="_blank">Twitter</a>
        </div>
        
        <div class="contact-info">
            <p>Email: <a href="mailto:info@kopikita.com">kopikita@gmail.com</a></p>
            <p>Phone: +62 812-5390-1839</p>
        </div>
    </div>
</footer>

<!-- Modal Box Item Detail -->
<div class="modal" id="menu-detail-modal">
    <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather = "x"></i></a>
        <div class="modal-content">
            <img src="{{ asset('img/kopi.jpg') }}" alt="kopi">
            <div class="menu-content">
                <h3>Espresso</h3>
                <p>Kopi pekat dengan rasa kuat dan aroma intens, disajikan dalam takaran kecil dengan lapisan crema di atasnya. Cocok untuk kamu yang suka cita rasa autentik—bisa dinikmati langsung untuk rasa pahit yang khas atau ditambah gula untuk sentuhan manis.</p>
                <div class="menu-price">Rp15.000</div>
                <a href="#"><i data-feather = "shopping-cart"></i><span>add to cart</span></a>
            </div>
        </div>
    </div>
</div>


<!-- feather Icons   -->
<script>
      feather.replace();
    </script>
</body>
</html>