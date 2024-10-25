<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - KopiKita</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/receipt.css') }}">
</head>
<body>

    <div class="container">
        <div class="receipt-box">
            <h1>KopiKita Receipt</h1>
            <hr>
            <h2>Thank you for your order!</h2>

            <div class="customer-info">
                <h3>Customer Information</h3>
                <table>
                    <tr><th>Name:</th><td>{{ request()->query('name', 'N/A') }}</td></tr>
                    <tr><th>Email:</th><td>{{ request()->query('email', 'N/A') }}</td></tr>
                    <tr><th>Phone:</th><td>{{ request()->query('phone', 'N/A') }}</td></tr>
                    <tr><th>Order ID:</th><td>{{ request()->query('order_id', 'N/A') }}</td></tr>
                </table>
            </div>

            <div class="order-info">
                <h3>Order Summary</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="order-items"></tbody>
                </table>

                <div class="total">
                    <h3>Total: {{ number_format(request()->query('total', 0), 0, ',', '.') }} IDR</h3>
                </div>
            </div>

            <hr>

            <div class="thank-you-message">
                <p>Thank you for shopping with us!</p>
                <p>We hope you enjoy your coffee.</p>
            </div>

            <a href="/user" class="kembali">Back to home</a>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
