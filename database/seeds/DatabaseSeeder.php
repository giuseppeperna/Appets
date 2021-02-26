<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipologiaSeeder::class,
            RistoranteSeeder::class,
            PiattoSeeder::class,
            OrdineSeeder::class,
            TipologiaRistoranteSeeder::class,
            PiattoOrdineSeeder::class,
        ]);
    }
}
