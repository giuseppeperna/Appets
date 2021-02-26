<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ordine;
use Faker\Generator as Faker;

$factory->define(Ordine::class, function (Faker $faker) {
    return [
        'ord_nome' => $faker->firstName,
        'ord_cognome' => $faker->lastName,
        'ord_indirizzo' => $faker->address,
        'ord_totale' => $faker->randomFloat(2, 9, 200),
        'ord_commenti' => $faker->text($maxNbChars = 380),
        'ord_stato' => $faker->boolean(85)
    ];
});
