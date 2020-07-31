<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '12345678',
            'password' => Hash::make('pass'),
            'name' => 'Admin',
            'academic_year' => '--',
            'age' => 100,
            'gender' => 1,
            'club' => 0
        ]);
    }
}
