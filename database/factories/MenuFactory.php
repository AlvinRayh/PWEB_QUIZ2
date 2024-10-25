<?php

// database/factories/MenuFactory.php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    protected $menuNames = [
        'Americano',
        'Cappuccino',
        'Kopi Gula Aren',
        'Espresso',
        'Cold Brew',
        'Mochachino',
        'Macchiato',
        'Iced tea',
        'Lemon tea',
        'Lychee tea',
        'Peach tea',
        'Orange tea',
        'Jasmine tea',
        'Mint tea'
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->menuNames), // Use predefined names
            'price' => $this->faker->numberBetween(5000, 50000),
            'stock' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->optional()->imageUrl(),
        ];
    }
}

