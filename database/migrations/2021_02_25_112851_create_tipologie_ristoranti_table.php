<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipologieRistorantiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipologie_ristoranti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipologia_id');
            $table->unsignedBigInteger('rist_id');
            $table->foreign('tipologia_id')->references('tipologia_id')->on('tipologie');
            $table->foreign('rist_id')->references('rist_id')->on('users');
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
        Schema::dropIfExists('tipologie_ristoranti');
    }
}
