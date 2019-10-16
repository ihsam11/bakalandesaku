<?php

use Illuminate\Database\Seeder;

class LineagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lineages = [
            'Anak',
            'Cucu',
            'Famili Lain',
            'Istri',
            'Kepala Keluarga',
            'Lainnya',
            'Menantu',
            'Mertua',
            'Orang Tua',
            'Suami'
        ];

        foreach ( $lineages as $list ) {
            DB::table('lineages')->insert([
                'name' => $list,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
