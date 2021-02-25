<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRistorantiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ristoranti', function (Blueprint $table) {
            $table->bigIncrements('rist_id');
            $table->string('rist_email', 50);
            $table->string('rist_password', 50);
            $table->string('rist_nome', 50);
            $table->text('rist_descrizione');
            $table->string('rist_indirizzo', 100);
            $table->string('rist_p_iva', 50);
            $table->rememberToken();
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
        Schema::dropIfExists('ristoranti');
    }
}
