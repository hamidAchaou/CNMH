<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'arbre competences',
                'description' => 'review report and code sprint 1',
                'startDate' => '2023-09-08',
                'endDate' => '2023-11-03',
            ],
            [
                'name' => 'cnmh',
                'description' => 'Le centre CNMH (Centre National Mohammed VI des Handicapés) gére ses patients de façon traditionnelle en utilisant des documents papier, mais cela a créé des difficultés pour recueillir des données précises sur les statistiques du centre. Ils nous ont demandé de travailler actuellement à la digitalisation des documents pour résoudre ce problème.',
                'startDate' => '2023-10-04',
                'endDate' => '2023-3-08',
            ],
        ]);

        DB::table('tasks')->insert([
            [
                'title' => 'teamplate Rapport',
                'description' => 'choisire template prototype',
                'project_id' => 1,
            ],
            [
                'title' => 'create Rapport',
                'description' => 'create Rapport arbre competencez',
                'project_id' => 1,
            ],
            [
                'title' => 'maquitte prototype cnmh',
                'description' => 'Créez une maquette prototype avec AdminLTE, HTML et CSS.',
                'project_id' => 2,
            ],
            [
                'title' => 'prototype cnmh',
                'description' => 'Créez une CRUD Projects et Tasks et member',
                'project_id' => 2,
            ]
        ]);

        DB::table('users')->insert([
            [
                'firstName' => 'AChaou',
                'lastName' => 'Hamid',
                'email' => 'hamid@gmail.com',
                'password' => '$2y$12$e80ITC5S0HOD7JY95GuBrukneqN/8vlxGMC5zAiLvZY/u1Et8LTk.',
                'role' => 'chefProjet',
            ],
            [
                'firstName' => 'AChaou',
                'lastName' => 'khalid',
                'email' => 'khalid@gmail.com',
                'password' => '$2y$12$7sXmPx2VQmsZDn9csOKTCedEU2FEI2KhXTvrjS/bfxx4F.gCWqfIe',
                'role' => 'member',
            ],
            [
                'firstName' => 'ADNAN',
                'lastName' => 'ADNANO',
                'email' => 'adnan@gmail.com',
                'password' => '$2y$12$VtYQ/ZleIrKNKf.S.6LqLejUoS.YvBlVUVKyBlko4nTSNzqtaBQ2K',
                'role' => 'member',
            ],
            [
                'firstName' => 'Betrji',
                'lastName' => 'Jalil',
                'email' => 'jalil@gmail.com',
                'password' => '$2y$12$0FbShrjlTCJ7dUvdnUsCQeaEztepI0S.0BRhl.2AWU2rU9jd5ZIb.',
                'role' => 'member',
            ]
        ]);
    }
}
