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
        Schema::create('ekspedienter', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('firma_id')->unsigned();
            $table->integer('bruger_id')->unsigned()->nullable();
            $table->integer('kortnummer')->unsigned();
            $table->string('navn', 255)->nullable();

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
        Schema::dropIfExists('ekspedienter');
    }
};
