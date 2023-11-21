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
                'name' => 'Installer admin LTE',
                'description' => 'Installer adminLTE sur le prototype maquette CNMH',
                'project_Id' => '1',
            ],
            [
                'name' => 'Page Projets',
                'description' => 'Création de la page Projets avec admin LTE',
                'project_Id' => '1',
            ],
            [
                'name' => 'Installer admin LTE',
                'description' => 'Installer avec admin LTE',
                'project_Id' => '2',
            ],
            [
                'name' => 'Migration',
                'description' => 'Création des tables Projets et Tâches dans la migration',
                'project_Id' => '1',
            ],
        ]);
    }
}
