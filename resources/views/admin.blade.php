<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Fonts and Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <script src="{{ asset('js/user.js') }}" defer></script>

</head>
<body>

<!-- Navbar -->
<nav class="navbar sticky-top">
<div class="nav-logo">
            <a href="#home">
    <img src="{{ asset('img/icon.jpeg') }}" alt="logo" class="logo-icon">
    </a>
    </div>

    <div class="navbar-right">
    <a href="#" id = "user-button"><i data-feather = "user"></i></a>
    </div>

    <!-- user -->
 <div class="user">
    <a href="/"><i data-feather = "log-out"></i><span>  Logout</span></a>
 </div>

</nav>

<!-- Product List Section -->
<section class="hero" id="home">
    <div class="product-list mt-5">
        <h4 class="text-center">Product List</h4>
        <div class="scroll">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT ID</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th>IMAGE PREVIEW</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->price }}</td>
                            <td>{{ $menu->stock }}</td>
                            <td>
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" style="width: 100px; height: auto;">
                            <td>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Add Menu Section -->
<section class="menu" id="menu">
    <div class="admin-container container pt-5">
        <div class="add-product-form">
            <h4 class="text-center">Add New Product</h4>
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Product Name" required class="form-control">
    <input type="text" name="stock" placeholder="Product Stock" required class="form-control">
    <input type="number" name="price" placeholder="Product Price" required class="form-control">
    <input type="file" name="image" accept="image/*" required class="form-control mt-3">
    <button type="submit" class="btn btn-primary mt-3">Add Product</button>
</form>


            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Footer -->
<footer></footer>

<!-- Feather Icons -->
<script>
    feather.replace();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>