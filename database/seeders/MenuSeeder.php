<?php

        // database/seeders/MenuSeeder.php
        
        namespace Database\Seeders;
        
        use Illuminate\Database\Seeder;
        use App\Models\Menu;
        
        class MenuSeeder extends Seeder
        {
            public function run()
            {
                $menuItems = [
                    [
                        'name' => 'Americano',
                        'price' => 15000,
                        'stock' => 100,
                        'image' => 'img/americano.jpg',
                    ],
                    [
                        'name' => 'Cappuccino',
                        'price' => 20000,
                        'stock' => 100,
                        'image' => 'img/cappuccino.jpeg',
                    ],
                    [
                        'name' => 'Kopi Gula Aren',
                        'price' => 18000,
                        'stock' => 100,
                        'image' => 'img/kopi_gula_aren.jpeg',
                    ],
                    [
                        'name' => 'Espresso',
                        'price' => 12000,
                        'stock' => 100,
                        'image' => 'img/espresso.jpg',
                    ],
                    [
                        'name' => 'Cold Brew',
                        'price' => 22000,
                        'stock' => 100,
                        'image' => 'img/coldbrew.jpeg',
                    ],
                    [
                        'name' => 'Mochachino',
                        'price' => 25000,
                        'stock' => 100,
                        'image' => 'img/mochachino.png',
                    ],
                    [
                        'name' => 'Macchiato',
                        'price' => 23000,
                        'stock' => 100,
                        'image' => 'img/macchiato.png',
                    ],
                    [
                        'name' => 'Iced tea',
                        'price' => 10000,
                        'stock' => 100,
                        'image' => 'img/iced_tea.jpeg',
                    ],
                    [
                        'name' => 'Lemon tea',
                        'price' => 9000,
                        'stock' => 100,
                        'image' => 'img/lemon_tea.jpeg',
                    ],
                    [
                        'name' => 'Lychee tea',
                        'price' => 12000,
                        'stock' => 100,
                        'image' => 'img/lychee_tea.jpeg',
                    ],
                    [
                        'name' => 'Peach tea',
                        'price' => 15000,
                        'stock' => 100,
                        'image' => 'img/peach_tea.jpeg',
                    ],
                    [
                        'name' => 'Orange tea',
                        'price' => 8000,
                        'stock' => 100,
                        'image' => 'img/orange_tea.jpeg',
                    ],
                    [
                        'name' => 'Jasmine tea',
                        'price' => 10000,
                        'stock' => 100,
                        'image' => 'img/jasmine_tea.jpeg',
                    ],
                    [
                        'name' => 'Mint tea',
                        'price' => 11000,
                        'stock' => 100,
                        'image' => 'img/mint_tea.jpeg',
                    ],
                ];
        
                foreach ($menuItems as $item) {
                    Menu::create($item); // Insert each menu item directly
                }
            }
        }