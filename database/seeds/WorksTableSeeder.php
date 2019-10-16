<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $work = [
            'Belum/Tidak Bekerja',
            'Buruh Harian Lepas',
            'Buruh Nelayan/Perikanan',
            'Buruh Peternakan',
            'Buruh Tani/Perkebunan',
            'Dokter',
            'Dosen',
            'Guru',
            'Industri',
            'Juru Masak',
            'Karyawan BUMN',
            'Karyawan BUMD',
            'Karyawan Honorer',
            'Karyawan Swasta',
            'Kepala Desa',
            'Lainnya',
            'Mekanik',
            'Mengurus Rumah Tangga',
            'Pedagang',
            'Pegawai Negeri Sipil (PNS)',
            'Pelajar/Mahasiswa',
            'Pembantu Rumah Tangga',
            'Pengacara',
            'Pensiunan',
            'Perangkat Desa',
            'Perawat',
            'Perdagangan',
            'Petani/Pekebun',
            'Peternak',
            'Seniman',
            'Sopir',
            'Tentara Nasional Indonesia (TNI)',
            'Transportasi',
            'Tukang Batu',
            'Tukang Jahit',
            'Tukang Kayu',
            'Tukang Las/Pandai Besi',
            'Ustadz/Mubaligh',
            'Wiraswasta'
        ];

        foreach ( $work as $list ) {
            DB::table('works')->insert([
                "name" => $list,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
