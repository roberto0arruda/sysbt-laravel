<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, 0, 200), // 48.8932
        'description' => $faker->text(10),
    ];
});
