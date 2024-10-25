<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Jalankan seeder untuk Payment terlebih dahulu
        // $this->call(PaymentSeeder::class);

        // // Jalankan Admin Seeder (mandiri)
        // $this->call(AdminSeeder::class);

        // // Jalankan seeder Location dan Seller (berurutan)
        // $this->call(LocationSeeder::class);
        // $this->call(SellerSeeder::class);

        // // Jalankan seeder Menu (bergantung pada Admin)
        // $this->call(MenuSeeder::class);

        // // Jalankan seeder untuk Customer
        // $this->call(CustomerSeeder::class);

        // // Jalankan Stock Seeder (bergantung pada Seller dan Menu)
        // $this->call(StockSeeder::class);
    }
}
