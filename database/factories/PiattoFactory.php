<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Piatto;
use Faker\Generator as Faker;

$factory->define(Piatto::class, function (Faker $faker) {

    $ristorantiIDs = DB::table('users')->pluck('rist_id');

    return [
        'rist_id' => $faker->randomElement($ristorantiIDs),
        'piatto_nome' => $faker->sentence(2, true),
        'piatto_img' => $faker->imageUrl(800, 600, 'food'),
        'piatto_descrizione' => $faker->text,
        'piatto_prezzo' => $faker->randomFloat(2, 0, 2),
        'piatto_visibile' => $faker->boolean(50)
    ];
});
