<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make("1234"),
                'role' => 1
            ),
            array(
                'name' => 'Mentor',
                'username' => 'Mentor',
                'email' => 'mentor@gmail.com',
                'password' => Hash::make("1234"),
                'role' => 2
            ),
            array(
                'name' => 'peserta',
                'username' => 'peserta',
                'email' => 'peserta@gmail.com',
                'password' => Hash::make("1234"),
                'role' => 3
            ),
        ));
    }
}

