<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'      => $faker->word, 
        'details'   => $faker->paragraph, 
        'price'     => $faker->numberBetween(100, 1000), 
        'discount'  => $faker->numberBetween(1, 10), 
        'stock'     => $faker->numberBetween(0, 10), 
    ];
});
