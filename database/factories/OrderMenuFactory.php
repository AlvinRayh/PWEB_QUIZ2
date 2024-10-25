<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderMenuFactory extends Factory
{
    public function definition()
    {
        return [
            'order_id' => Order::inRandomOrder()->first()?->id ?? Order::factory()->create()->id,
            'menu_id' => Menu::inRandomOrder()->first()?->id ?? Menu::factory()->create()->id,
        ];
    }
}
