<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdiniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordini', function (Blueprint $table) {
            $table->bigIncrements('ord_id');
            $table->string('ord_nome', 50);
            $table->string('ord_cognome', 50);
            $table->string('ord_indirizzo', 100);
            $table->unsignedDecimal('ord_totale', 6, 2);
            $table->text('ord_commenti');
            $table->boolean('ord_stato');
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
        Schema::dropIfExists('ordini');
    }
}
