<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_bootcamps')->insert(array(
            array(
                'kategori' => 'Reach JS',
                'slug' => 'reach-js',
            ),

            array(
                'kategori' => 'Music',
                'slug' => 'music',
            ),

            array(
                'kategori' => 'Photography',
                'slug' => 'photography',
            ),

            array(
                'kategori' => 'Technic',
                'slug' => 'Technic',
            ),
        ));
    }
}
