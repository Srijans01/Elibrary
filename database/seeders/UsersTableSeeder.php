<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'admin',  
    ]);
        DB::table('users')->insert([
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => Hash::make('password'),
        'role' => 'user',
      ]);
    }
}
