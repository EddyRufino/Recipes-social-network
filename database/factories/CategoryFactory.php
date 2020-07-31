<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$word = $faker->sentence(3);
    return [
        'name' => ucfirst($word),
        'slug' => Str::slug($word),
    ];
});
