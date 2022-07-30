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
        DB::table('grades')->insert([ 'G_name' => 'Directeur', 'T_Journalier' => 800]);
        DB::table('grades')->insert([ 'G_name' => 'chef dep', 'T_Journalier' => 700]);
        DB::table('grades')->insert([ 'G_name' => 'chef service', 'T_Journalier' => 500]);
        
        
    }
}
