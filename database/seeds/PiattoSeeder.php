<?php

use Illuminate\Database\Seeder;
use App\Piatto;

class PiattoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Piatto::class, 40)->create()->each(
            function($piatto) {
                $piatto->save();
            }
        );
    }
}
