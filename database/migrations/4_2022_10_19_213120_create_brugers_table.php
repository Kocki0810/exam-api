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
        Schema::create('brugere', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('firma_id')->unsigned();
            $table->integer('ekspedient_id')->unsigned();
            $table->string('navn', 255)->nullable();
            $table->string('password', 255);
            $table->timestamp('last_login')->nullable();
            $table->string('last_IP', 255)->nullable();
            $table->string('email', 255);
            $table->string('telefon', 255);
            $table->string('remember_token', 255)->nullable();

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
        Schema::dropIfExists('brugere');
    }
};
