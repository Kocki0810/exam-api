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
        Schema::create('ordre', function (Blueprint $table) {
            $table->increments('id')->unsinged();
            $table->integer('firma_id')->unsigned();
            $table->integer('ekspedient_id')->nullable()->unsigned();
            $table->integer('pris');
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
        Schema::dropIfExists('ordre');
    }
};
