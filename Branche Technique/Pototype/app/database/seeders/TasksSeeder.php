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
                'name' => 'choisir le thème',
                'description' => 'choisir le thème pour créer un portfolio',
                'project_Id' => '1',
            ],
            [
                'name' => 'Choix des Technologies',
                'description' => 'Évaluation et sélection des technologies les plus adaptées pour développer l\'application Arbre des Compétences.',
                'project_Id' => '2',
            ],
            [
                'name' => 'Design wireframes for CNMH Application',
                'description' => 'Create wireframes detailing the layout and functionalities of the CNMH application.',
                'project_Id' => '3',
            ],
            [
                'name' => 'Develop basic database structure',
                'description' => 'Design and implement the basic database structure for the CNMH application.',
                'project_Id' => '3',
            ],
            [
                'name' => 'Build user authentication system',
                'description' => 'Implement user authentication and authorization functionalities for the CNMH application.',
                'project_Id' => '3',
            ],
        ]);
    }
}
