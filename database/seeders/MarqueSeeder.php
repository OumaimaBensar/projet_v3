<?php

namespace Database\Seeders;
use App\Models\Marque;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MarqueSeeder extends Seeder
{
    /**
     * Run th
     * e database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marques')->insert([ 'name_Marque' => 'Toyota']);
        DB::table('marques')->insert([ 'name_Marque' => 'Volkswagen']);
        DB::table('marques')->insert([ 'name_Marque' => 'Ford']);
        DB::table('marques')->insert([ 'name_Marque' => 'Honda']);
        DB::table('marques')->insert([ 'name_Marque' => 'Peugeot']);
        DB::table('marques')->insert([ 'name_Marque' => 'Nissan']);
        DB::table('marques')->insert([ 'name_Marque' => 'Renault']);
        DB::table('marques')->insert([ 'name_Marque' => 'opel']);
    }
}
