<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([ 'name' => 'admin']);
        DB::table('roles')->insert([ 'name' => 'saisi']);
        DB::table('roles')->insert([ 'name' => 'G_Mission']);
        DB::table('roles')->insert([ 'name' => 'RH']);
        DB::table('roles')->insert([ 'name' => 'Validation']);

    }
}
