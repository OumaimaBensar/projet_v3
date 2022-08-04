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
        DB::table('grades')->insert([ 'G_name' => 'Directeur General', 'T_Journalier' => 1000]);
        DB::table('grades')->insert([ 'G_name' => 'Directeur', 'T_Journalier' => 900]);
        DB::table('grades')->insert([ 'G_name' => 'chef de departement', 'T_Journalier' => 700]);
        DB::table('grades')->insert([ 'G_name' => 'chef de service', 'T_Journalier' => 640]);
        DB::table('grades')->insert([ 'G_name' => 'Cadre', 'T_Journalier' => 500]);
        DB::table('grades')->insert([ 'G_name' => 'Agent de Metrise', 'T_Journalier' => 470]);
        DB::table('grades')->insert([ 'G_name' => "Agent d'Execution", 'T_Journalier' => 400]);
          
    }
}
