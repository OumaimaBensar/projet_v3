<?php

namespace Database\Seeders;
use App\Models\Authorisation;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AuthorisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authorisations')->insert([ 'name' => 'auth_show']);
        DB::table('authorisations')->insert([ 'name' => 'auth_edit']);
        DB::table('authorisations')->insert([ 'name' => 'auth_create']);
        DB::table('authorisations')->insert([ 'name' => 'auth_delete']);
        
    }
}
