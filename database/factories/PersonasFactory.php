<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Personas;
use Faker\Generator as Faker;

$factory->define(Personas::class, function (Faker $faker) {

    return [
        'documento' => $faker->word,
        'primer_nombre' => $faker->word,
        'segundo_nombre' => $faker->word,
        'primer_apellido' => $faker->word,
        'segundo_apellido' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
