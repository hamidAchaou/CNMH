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
        DB::table("projects")->insert([
            [
                'name' => 'Portfolio',
                'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
            ],
            [
                'name' => 'Arbre des compétences',
                'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
            ],
            [
                'name' => 'CNMH',
                'description' => 'Création d\'une application web pour la gestion des patients du centre CNMH.',
            ]
        ]);
    }
}
