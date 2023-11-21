<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'Prototype maquette',
                'description' => 'Création du prototype maquette CNMH',
            ],
            [
                'name' => 'Prototype d\'application',
                'description' => 'Création du prototype d\'application CNMH',
            ]
        ]);
    }
}
