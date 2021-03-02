<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiattiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piatti', function (Blueprint $table) {
            $table->bigIncrements('piatto_id');
            $table->unsignedBigInteger('rist_id');
            $table->string('piatto_nome', 50);
            $table->string('piatto_img')->nullable();
            $table->text('piatto_descrizione');
            $table->unsignedDecimal('piatto_prezzo', 6, 2);
            $table->boolean('piatto_visibile');
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
        Schema::dropIfExists('piatti');
    }
}
