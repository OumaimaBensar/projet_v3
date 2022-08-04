<?php

namespace Database\Seeders;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([ 'S_name' => 'Planification et Etude Strategiques', 'departement_id'=>1]);
        DB::table('services')->insert([ 'S_name' => 'Monitoring de la Strategie Logistique', 'departement_id'=>1]);
        DB::table('services')->insert([ 'S_name' => 'Etude de Marchee', 'departement_id'=>2]);
        DB::table('services')->insert([ 'S_name' => 'Promotion', 'departement_id'=>2]);
        DB::table('services')->insert([ 'S_name' => 'Communication', 'departement_id'=>3]);
        DB::table('services')->insert([ 'S_name' => 'Cooperation', 'departement_id'=>3]);
        DB::table('services')->insert([ 'S_name' => 'Developpement SI', 'departement_id'=>4]);
        DB::table('services')->insert([ 'S_name' => 'Reseau et Materiel Informatique', 'departement_id'=>4]);
        DB::table('services')->insert([ 'S_name' => 'Relation avec la profession logistique', 'departement_id'=>5]);
        DB::table('services')->insert([ 'S_name' => 'Reglementation et Normalisation', 'departement_id'=>5]);
        DB::table('services')->insert([ 'S_name' => 'Developpement des competences logistique', 'departement_id'=>5]);
        DB::table('services')->insert([ 'S_name' => 'Action et Flux Transversaux', 'departement_id'=>6]);
        DB::table('services')->insert([ 'S_name' => 'Action et Flux Sectoriels', 'departement_id'=>6]);
        DB::table('services')->insert([ 'S_name' => 'Ingenieurie Technique', 'departement_id'=>7]);
        DB::table('services')->insert([ 'S_name' => 'Structuration Juridicaux Fincieres', 'departement_id'=>7]);
        DB::table('services')->insert([ 'S_name' => 'Affaires Foncieres', 'departement_id'=>7]);
        DB::table('services')->insert([ 'S_name' => 'Zones Logistique du Grand Casablanca', 'departement_id'=>8]);
        DB::table('services')->insert([ 'S_name' => 'Zone Logistique des regions', 'departement_id'=>8]);
        DB::table('services')->insert([ 'S_name' => 'Budget et Controle de Gestion', 'departement_id'=>9]);
        DB::table('services')->insert([ 'S_name' => 'Comptabilte', 'departement_id'=>9]);
        DB::table('services')->insert([ 'S_name' => 'Ressource Humaines', 'departement_id'=>10]);
        DB::table('services')->insert([ 'S_name' => 'Achats et Moyen Generaux', 'departement_id'=>10]);
        DB::table('services')->insert([ 'S_name' => 'Statistique et BDD', 'departement_id'=>11]);
        DB::table('services')->insert([ 'S_name' => 'Prospective, Ville et Etudes', 'departement_id'=>11]);
        DB::table('services')->insert([ 'S_name' => 'none', 'departement_id'=>12]);







    }
}
