<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkter', function (Blueprint $table) {
            $table->increments('id')->unsinged();
            $table->integer('produktgruppe_id')->unsigned();
            $table->integer('firma_id')->unsigned();
            $table->string('navn', 255);
            $table->integer('pris');

            $table->softDeletes();            
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
        Schema::dropIfExists('produkter');
    }
};
