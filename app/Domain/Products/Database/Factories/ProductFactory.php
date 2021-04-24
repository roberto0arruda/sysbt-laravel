<?php


namespace App\Domain\Products\Database\Factories;

use App\Domain\Products\Models\Product;
use App\Support\Database\ModelFactory;

class ProductFactory extends ModelFactory
{
    protected $model = Product::class;

    protected function fields(): array
    {
        return [
            'title' => $this->faker->unique()->city,
            'description' => rand(1, 10) % 2 == 0 ? $this->faker->sentence() : null,
            'price' => $this->faker->randomNumber(3)
        ];
    }
}
