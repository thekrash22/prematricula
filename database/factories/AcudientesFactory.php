<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Acudientes;
use Faker\Generator as Faker;

$factory->define(Acudientes::class, function (Faker $faker) {

    return [
        'persona_id' => $faker->word,
        'direccion' => $faker->word,
        'barrio' => $faker->word,
        'profesion' => $faker->word,
        'correo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
