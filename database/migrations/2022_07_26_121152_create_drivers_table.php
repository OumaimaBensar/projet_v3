<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
             $table->string('Prenom');
             $table->string('CIN')->unique();
             $table->string('Email')->unique();
             $table->string('Num_tel')->unique();
             $table->date('Expiration_PC');
             $table->string('Numero_PC')->unique();
             $table->unsignedBigInteger('Nbre_deplacement');
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
        Schema::dropIfExists('drivers');
    }
}
