<?php

namespace Database\Seeders;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([ 'G_name' => 'Directeur General', 'T_Journalier' => 1000, 'ponderation'=>7]);
        DB::table('grades')->insert([ 'G_name' => 'Directeur', 'T_Journalier' => 900 , 'ponderation'=>6]);
        DB::table('grades')->insert([ 'G_name' => 'chef de departement', 'T_Journalier' => 700, 'ponderation'=>5]);
        DB::table('grades')->insert([ 'G_name' => 'chef de service', 'T_Journalier' => 640, 'ponderation'=>4]);
        DB::table('grades')->insert([ 'G_name' => 'Cadre', 'T_Journalier' => 500, 'ponderation'=>3]);
        DB::table('grades')->insert([ 'G_name' => 'Agent de Metrise', 'T_Journalier' => 470, 'ponderation'=>2]);
        DB::table('grades')->insert([ 'G_name' => "Agent d'Execution", 'T_Journalier' => 400, 'ponderation'=>1]);
          
    }
}
