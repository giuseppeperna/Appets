<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tipologia;
use Faker\Generator as Faker;

$factory->define(Tipologia::class, function (Faker $faker) {
    return [
        'tipologia_nome'=> $faker->unique()->word
    ];
});
