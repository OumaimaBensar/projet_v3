<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(AuthorisationSeeder::class);
        $this->call(MarqueSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(ServiceSeeder::class);


    }
}

