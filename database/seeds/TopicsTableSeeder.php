<?php

use App\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $topics =[ 'Pembangunan', 'Kegiatan', 'BPD', 'LPMD', 'Karang Taruna', 'Linmas', 'PKK', 'Posyandu', 'Keagamaan' ];

        foreach ($topics as $list) {
	        Topic::create ([
	        	"name" 		 => $list,
	        	"created_at" => date('Y-m-d H:i:s'),
	        	"updated_at" => date('Y-m-d H:i:s')
	        ]);
        }
    }
}
