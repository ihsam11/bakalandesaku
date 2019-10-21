<?php

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
        //
        $users = array(
            [
                'nik' => '1111111111111111',
                'password' => Hash::make('admin'),
                'name' => ucwords('admin'),
                'email' => 'admin@admin.com',
                'role_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')            
            ],
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
