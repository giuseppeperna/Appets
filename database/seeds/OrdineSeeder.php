<?php

use Illuminate\Database\Seeder;
use App\Ordine;

class OrdineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ordine::class, 40)->create()->each(
            function($ordine){
                $ordine->save();
            }
        );
    }
}
