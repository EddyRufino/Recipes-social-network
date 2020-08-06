<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Perfil;
use Faker\Generator as Faker;

$factory->define(Perfil::class, function (Faker $faker) {
	$fileName = $faker->numberBetween(1, 3) . '.png';
    return [
        'user_id' => User::all()->random()->id,
        'biography' => $faker->sentence(10),
        'image' => "img/products/{$fileName}",
    ];
});
