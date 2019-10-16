<?php

use Illuminate\Database\Seeder;
use App\Profile;
use Illuminate\Support\Facades\File;


class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('doc/json/profile.json'));
        $data = json_decode($json);
        $array1 = (array) $data;        
        foreach ($array1 as $profile) {
            Profile::create([
                "register_date" => date("Y-m-d H:i:s", strtotime($profile->register_date)),
                "nik"           => $profile->nik,
                "kk_id"         => $profile->kk_id,
                "name"          => $profile->name,
                "birth_place"   => $profile->birth_place,
                "birth_date"    => date("Y-m-d", strtotime($profile->birth_date)),
                "blood_type"    => (int) $profile->blood_type,
                "address"       => $profile->address,
                "religion"      => $profile->religion,
                "marriage"      => $profile->marriage,
                "work"          => $profile->job,
                "gender"        => $profile->gender,
                "rt"            => $profile->rt,
                "rw"            => $profile->rw,
                "education"     => $profile->education,
                "citizenship"   => $profile->citizenship,
                "lineage"       => $profile->lineage,
                "father_name"   => $profile->father_name,
                "mother_name"   => $profile->mother_name,
                "photo_path"    => $profile->photo_path,
                "status"        => $profile->status,
            ]);
        }  
    }
}
