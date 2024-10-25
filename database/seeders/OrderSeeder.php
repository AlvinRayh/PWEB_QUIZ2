<?php

// database/seeders/OrderSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Create a specific number of orders
        Order::factory()->count(10)->create(); // Adjust the count as needed
    }
}
