<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');	
            $table->string('prenom');
            $table->string('CIN')->unique();
            $table->string('mail_prof')->unique();
            $table->string('num_tele')->unique(); 
            $table->unsignedBigInteger('grade_id'); 
            $table->unsignedBigInteger('direction_id');    	    	
            $table->unsignedBigInteger('departement_id');    	
            $table->unsignedBigInteger('service_id');

            $table->enum('V_perso',['Yes','No']);
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
