<?php

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
        //
        $this->call
        ([
            UsersTableSeeder::class,
            BloodTypesTableSeeder::class,
            EducationsTableSeeder::class,
            JobsTableSeeder::class,
            LineagesTableSeeder::class,
            ReligionsTableSeeder::class,
            RolesTableSeeder::class,
            MarriagesTableSeeder::class
        ]);
    }
}
