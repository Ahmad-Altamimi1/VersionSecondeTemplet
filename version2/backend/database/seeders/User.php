<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ahmad',
            'email' => 'zz@gmail.com',
            'admin'=>1, 
            'password' => Hash::make('password'),
          
        ]);
    }
}
