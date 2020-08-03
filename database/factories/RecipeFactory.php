<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Recipe;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
	$word = $faker->sentence(8);
    $fileName = $faker->numberBetween(1, 3) . '.png';
    return [
        'title' => ucfirst($word),
        'slug' => Str::slug($word),
        'ingredient' => $faker->sentence(15),
        'preparation' => $faker->sentence(15),
        'image' => "img/products/{$fileName}",
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
});
