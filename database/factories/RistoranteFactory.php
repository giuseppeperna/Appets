<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ristorante;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Ristorante::class, function (Faker $faker) {
    return [
        'rist_email' => $faker->unique()->safeEmail,
        'rist_password' => $faker->unique()->password,
        'rist_nome' => $faker->sentence(3, true),
        'rist_descrizione' => $faker->text,
        'rist_indirizzo' => $faker->address,
        'rist_p_iva' => $faker->unique()->numerify('###########'),
        'remember_token' => Str::random(10),
    ];
});
