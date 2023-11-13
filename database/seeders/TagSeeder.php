<?php

namespace Database\Seeders;

use Faker\Provider\ar_EG\Internet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert(array(
            array(
                'tags' => 'Home Alone',
                'slug' => 'home-alone',
            ),

            array(
                'tags' => 'Internet',
                'slug' => 'internet',
            ),

            array(
                'tags' => 'Ditaktor ',
                'slug' => 'ditaktor',
            ),

            array(
                'tags' => 'Dramatic',
                'slug' => 'dramatic',
            ),
        ));
    }
}
