<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->unique()->password,
        'rist_nome' => $faker->sentence(3, true),
        'rist_descrizione' => $faker->text,
        'rist_indirizzo' => $faker->address,
        'rist_p_iva' => $faker->unique()->numerify('###########'),
        'remember_token' => Str::random(10),
    ];
});
