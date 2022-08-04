<?php

namespace Database\Seeders;
use App\Models\Direction;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('Directions')->insert([ 'Dir_name' => 'Direction Strategie, Etude et information']);
        DB::table('Directions')->insert([ 'Dir_name' => 'Direction Operateurs et chaines logistiques']);
        DB::table('Directions')->insert([ 'Dir_name' => 'Direction Devlopement des zones logistiques']);
        DB::table('Directions')->insert([ 'Dir_name' => 'Asistanat de Direction']);
        DB::table('Directions')->insert([ 'Dir_name' => 'none']);
    }
}
