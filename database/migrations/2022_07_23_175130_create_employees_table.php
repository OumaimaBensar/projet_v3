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
            $table->enum('V_perso',['Yes','No']);
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');


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
