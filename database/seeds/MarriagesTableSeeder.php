<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarriagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $marriages = [ 
            'Belum Kawin',
            'Cerai Hidup',
            'Cerai Mati',
            'Kawin'
        ];

        foreach ($marriages as $list ) {
            DB::table('marriages')->insert([
                'name' => $list,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
