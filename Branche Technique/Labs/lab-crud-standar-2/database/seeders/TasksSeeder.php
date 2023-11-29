<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'nom' => 'choisir le thème',
                'description' => 'choisir le thème pour créer un portfolio',
                'projetId' => '1',
            ],
            [
                'nom' => 'Choix des Technologies',
                'description' => 'Évaluation et sélection des technologies les plus adaptées pour développer l\'application Arbre des Compétences.',
                'projetId' => '2',
            ],
            [
                'nom' => 'Design wireframes for CNMH Application',
                'description' => 'Create wireframes detailing the layout and functionalities of the CNMH application.',
                'projetId' => '3',
            ],
            [
                'nom' => 'Develop basic database structure',
                'description' => 'Design and implement the basic database structure for the CNMH application.',
                'projetId' => '3',
            ],
            [
                'nom' => 'Build user authentication system',
                'description' => 'Implement user authentication and authorization functionalities for the CNMH application.',
                'projetId' => '3',
            ],
        ]);
    }
}
