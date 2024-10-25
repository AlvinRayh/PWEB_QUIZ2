<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderMenu;
use Illuminate\Database\Seeder;

class OrderMenuSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua order secara berurutan berdasarkan id
        $orders = Order::orderBy('id')->get();

        // Iterasi setiap order
        $orders->each(function ($order) {
            // Pilih 2 hingga 4 menu secara acak
            $menus = Menu::inRandomOrder()->take(rand(2, 4))->get();

            // Tambahkan menu ke order_menu dan hitung total amount
            $totalAmount = 0;

            foreach ($menus as $menu) {
                // Tambahkan ke pivot table
                OrderMenu::factory()->create([
                    'order_id' => $order->id,
                    'menu_id' => $menu->id,
                ]);

                // Tambahkan harga menu ke total amount
                $totalAmount += $menu->price;
            }

            // Update total_amount di tabel orders
            $order->update(['total_amount' => $totalAmount]);
        });
    }
}
