<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'order_date' => $this->faker->date(),
            'total_amount' => $this->faker->numberBetween(10000, 500000),
            'payment_status' => $this->faker->randomElement([0, 1]), // 0: Pending, 1: Completed
            'payment_method' => $this->faker->randomElement(['Cash', 'Credit Card', 'Bank Transfer']),
            'admin_id' => Admin::factory(),
            'customer_id' => Customer::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
