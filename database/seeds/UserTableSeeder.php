<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 50)->create()->each(function ($user) {
            $user->posts()->save()(factory(User::class)->make());
        });
    }
}