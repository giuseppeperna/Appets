<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PiattoOrdine;
use Faker\Generator as Faker;

$factory->define(PiattoOrdine::class, function (Faker $faker) {

    $piattiIDs = DB::table('piatti')->pluck('piatto_id');
    $ordiniIDs = DB::table('ordini')->pluck('ord_id');

    return [
        'piatto_id' => $faker->randomElement($piattiIDs),
        'ord_id' => $faker->randomElement($ordiniIDs),
        'quantità' => $faker->randomDigit,
        'sub_totale' => $faker->randomFloat(2, 9, 100),
    ];
});
