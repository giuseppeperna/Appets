<?php

use Illuminate\Database\Seeder;
use App\Ristorante;

class RistoranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ristorante::class, 20)->create()->each(
            function($ristorante){
                $ristorante->save();
            }
        );
    }
}
