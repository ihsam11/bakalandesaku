<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $educations = [
            'Akademi/Diploma III/Sarjana Muda',
            'Diploma I/II',
            'Diploma IV/Strata I',
            'SLTA/Sederajat',
            'SLTP/Sederajat',
            'Strata II',
            'Tamat SD/Sederajat',
            'Tidak Tamat SD/Sederajat',
            'Tidak/Belum Sekolah'
        ];

        foreach ( $educations as $list ) {
            DB::table('educations')->insert([
                'name' => $list,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
