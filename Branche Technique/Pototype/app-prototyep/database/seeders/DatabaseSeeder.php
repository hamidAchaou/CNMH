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
                'name' => 'prototype cnmh',
                'description' => 'create prototype cnmh, create to-do list projects with tasks',
                'startDate' => '2023-11-04',
                'endDate' => '2023-11-08',
            ],
            [
                'name' => 'sprint 1 cnmh',
                'description' => 'review report and code sprint 1',
                'startDate' => '2023-11-08',
                'endDate' => '2023-11-29',
            ]
        ]);

        DB::table('tasks')->insert([
            [
                'title' => 'create template',
                'description' => 'create template prototype',
                'status' => 'done',
                'project_id' => 1,
            ],
            [
                'title' => 'project context',
                'status' => '',
                'description' => 'read project context',
                'project_id' => 1,
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Hamido',
                'email' => 'hamid@gmail.com',
                'password' => '$2y$12$e80ITC5S0HOD7JY95GuBrukneqN/8vlxGMC5zAiLvZY/u1Et8LTk.',
            ]
        ]);
    }
}
