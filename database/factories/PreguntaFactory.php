<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pregunta;
use Faker\Generator as Faker;

$factory->define(Pregunta::class, function (Faker $faker) {
    return [
        'universidad_id' => 1,
        'SubCategoria_id' => $faker->numberBetween(1,3),
        'pregunta' => $faker->sentence(15),
        'opcion1' => $faker->state,
        'opcion2' => $faker->numberBetween(8,1000),
        'opcion3' => $faker->numberBetween(1,3),
        'respuesta' => $faker->state,
        'imagen' => 'imagendfaa',
    ];
});
