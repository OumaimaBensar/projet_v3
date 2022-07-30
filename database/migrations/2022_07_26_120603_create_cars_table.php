<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {

            $table->id();
        
            $table->string('matricule')->unique();
            $table->unsignedBigInteger('marque_id');
            $table->date('assurance');
            $table->date('date_aquisition');
            $table->date('derniere_visite_tech');
            $table->date('fin_carte_grise');
            $table->enum('etat_meca',['En panne','RAS'])->default('RAS');
            $table->enum('etat_disp',['Disponible','Indisponible'])->default('Disponible');
            $table->enum('Carburant',['Diesel','Essence']);
            $table->unsignedBigInteger('kilometrage');	
            $table->unsignedBigInteger('puissance');
            $table->unsignedBigInteger('consom_100');
            $table->unsignedBigInteger('poid_vide');
            $table->unsignedBigInteger('nbre_place');
            $table->unsignedBigInteger('capacite_bagage');	

            $table->timestamps();

            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
