<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annonces')->insert([
            'name' => 'Ma première annonce',
            'description' => 'Lorem ipsum',
            'price' => 10.5
        ]);
        DB::table('annonces')->insert([
            'name' => 'Ma seconde annonce',
            'description' => 'Lorem ipsum 2',
            'price' => 5
        ]);
        DB::table('annonces')->insert([
            'name' => 'Ma troisième annonce',
            'description' => 'Lorem ipsum 3',
            'price' => 54
        ]);
    }
}
