<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'SubCategoria_id' => $faker->numberBetween(1,3),
        'pregunta' => $faker->sentence(),
        'opcion1' => $faker->state,
        'opcion2' => $faker->numberBetween(8,1000),
        'opcion3' => $faker->numberBetween(1,3),
        'respuesta' => $faker->state,
    ];
});
