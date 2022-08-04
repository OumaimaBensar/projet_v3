<?php

namespace Database\Seeders;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([ 'Dep_name' => 'Etude Strategique et Monitoring', 'direction_id'=> 1]);
        DB::table('departements')->insert([ 'Dep_name' => 'Etude de Marche et Promotion', 'direction_id'=> 1]);
        DB::table('departements')->insert([ 'Dep_name' => 'Communication et Cooperation', 'direction_id'=> 1]);
        DB::table('departements')->insert([ 'Dep_name' => "Systemes d'information",'direction_id'=> 1]);
        DB::table('departements')->insert([ 'Dep_name' => 'Devlopement des Logiticiens', 'direction_id'=> 2]);
        DB::table('departements')->insert([ 'Dep_name' => 'Modernisation des chaines Logistique', 'direction_id'=> 2]);
        DB::table('departements')->insert([ 'Dep_name' => 'Montage et Conception des Zone Logistiques', 'direction_id'=> 3]);
        DB::table('departements')->insert([ 'Dep_name' => 'Projets Zones Logiques', 'direction_id'=> 3]);
        DB::table('departements')->insert([ 'Dep_name' => 'Financier', 'direction_id'=> 4]);
        DB::table('departements')->insert([ 'Dep_name' => 'RH et Affaire Generales', 'direction_id'=> 4]);
        DB::table('departements')->insert([ 'Dep_name' => "Seretariat de l'observation", 'direction_id'=> 4]);
        DB::table('departements')->insert([ 'Dep_name' => 'none', 'direction_id'=> 5]);

    }
}
