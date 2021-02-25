<?php

use Illuminate\Database\Seeder;
use App\Tipologia;

class TipologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tipologia::class, 10)->create()->each(
            function($tipologia){
                $tipologia->save();
            }
        );
    }
}
