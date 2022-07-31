<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_id');    	
            $table->unsignedBigInteger('user_id');
            $table->enum('Reponse',['Accorder','Rejeter definitivement', 'Edit Again']);
            $table->text('Motif_Validation')->nullable();
            $table->timestamps();

            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validations');
    }
}
