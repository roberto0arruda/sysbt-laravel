<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->city,
        'description' => rand(1, 10) % 2 == 0 ? $faker->sentence() : null,
        'price' => $faker->randomNumber(3)
    ];
});
