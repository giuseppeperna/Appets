<?php

use Illuminate\Database\Seeder;

class PiattoOrdineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordiniIDs = DB::table('ordini')->pluck('ord_id');

        factory(App\PiattoOrdine::class, $ordiniIDs->count())->create()->each(
            function($ordine){
                $ordine->save();
            }
        );
    }
}
