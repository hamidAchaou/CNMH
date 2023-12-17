<?php

namespace Database\Seeders;

use App\Models\Project;
use DateTime;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDate = new DateTime();
        Project::create([
            'name' => 'CNMH',
            'description' => 'Création d\'une application web pour la gestion des patients du centre CNMH.',
            'start_date' => $currentDate->format('Y-m-d'),
            'end_date' => $currentDate->modify('+6 months')->format('Y-m-d'),
        ]);

        Project::create([
            'name' => 'Arbre des compétences',
            'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
            'start_date' => $currentDate->format('Y-m-d'),
            'end_date' => $currentDate->modify('+3 months')->format('Y-m-d'),
        ]);

        Project::create([
            'name' => 'Portfolio',
            'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
            'start_date' => $currentDate->format('Y-m-d'),
            'end_date' => $currentDate->modify('+1 months')->format('Y-m-d'),
        ]);
    }
}
