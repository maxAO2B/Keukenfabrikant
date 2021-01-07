<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keukenfabrikant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keukenfabrikant', function(Blueprint $table){
            $table->id();
            $table->string('Bedrijfsnaam');
            $table->char('bedrijfswebsite');
            $table->string('plaats');
            $table->string('straatnaam');
            $table->integer('huisnummer');
            $table->char('postcode');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('approved');
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
        Schema::dropIfExists('keukenfabrikant');
    }
}
