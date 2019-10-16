<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blood_types = [ 'A','B','AB','O','O+' ];

        foreach ( $blood_types as $list ) {
            DB::table('blood_types')->insert([
                'name' => $list,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}
