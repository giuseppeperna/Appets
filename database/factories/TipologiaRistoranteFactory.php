<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipologiaRistorante;
use Faker\Generator as Faker;

$factory->define(TipologiaRistorante::class, function (Faker $faker) {

    $tipologieIDs = DB::table('tipologie')->pluck('tipologia_id');
    $ristorantiIDs = DB::table('users')->pluck('rist_id');

    return [
        'tipologia_id' => $faker->randomElement($tipologieIDs),
        'rist_id' => $faker->randomElement($ristorantiIDs)
    ];
});
