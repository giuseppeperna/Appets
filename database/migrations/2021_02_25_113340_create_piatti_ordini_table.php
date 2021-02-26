<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiattiOrdiniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piatti_ordini', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('piatto_id');
            $table->unsignedBigInteger('ord_id');
            $table->foreign('piatto_id')->references('piatto_id')->on('piatti');
            $table->foreign('ord_id')->references('ord_id')->on('ordini');
            $table->tinyInteger('quantità');
            $table->unsignedDecimal('sub_totale', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piatti_ordini');
    }
}
