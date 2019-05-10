<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'ochieng',
            'email'=>'ochiengdoa@mail',
            'password'=>Hash::make('admin'),
            'remember_token'=>str_random(10)
        ]);
    }
}
