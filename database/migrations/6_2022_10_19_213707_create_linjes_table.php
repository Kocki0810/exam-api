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
        Schema::create('linjer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produkt_id')->nullable()->unsigned();
            $table->integer('ordre_id')->unsigned();
            $table->string('bontekst', 255);
            $table->integer('pris');
            $table->integer('antal');
            $table->timestamp('date');
            
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
        Schema::dropIfExists('linjer');
    }
};
