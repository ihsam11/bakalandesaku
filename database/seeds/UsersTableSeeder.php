<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
        foreach ($array1 as $user) {
            User::create ([
                "nik"        => $user->nik,
                "password"   => Hash::make('user'),
                "name"       => $user->name,
                "email"      => substr($user->name, 3).substr($user->nik, -9, 9)."@gmail.com",
                "role_id"    => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s') 
            ]);
        }
        
        $data = ([
            'nik' => '1111111111111111',
            'password' => Hash::make('admin'),
            'name' => ucwords('admin'),
            'email' => 'admin@admin.com',
            'role_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')            
        ]);

        DB::table('users')->insert($data);
        //
        $users = array(
            [
                'nik' => '2222222222222222',
                'password' => Hash::make('user'),
                'name' => ucwords('user'),
                'email' => 'usr@usr.com',
                'role_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')            
            ]
        );

        DB::table('users')->insert($users);
    }
}
