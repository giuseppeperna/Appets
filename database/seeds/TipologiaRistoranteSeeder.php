<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipologiaRistoranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $ristorantiIDs = DB::table('users')->pluck('rist_id');

        factory(App\TipologiaRistorante::class, 30)->create();
    }
}
