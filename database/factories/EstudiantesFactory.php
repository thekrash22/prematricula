<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Estudiantes;
use Faker\Generator as Faker;

$factory->define(Estudiantes::class, function (Faker $faker) {

    return [
        'persona_id' => $faker->randomDigitNotNull,
        'codigo' => $faker->word,
        'grado' => $faker->word,
        'eps' => $faker->word,
        'cupo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
