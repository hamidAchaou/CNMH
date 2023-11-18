<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // table usesr
                DB::table('users')->insert([
                    [
                        'firstName' => 'AChaou',
                        'lastName' => 'Hamid',
                        'email' => 'hamid@gmail.com',
                        'password' => Hash::make('hamid@gmail.com'),
                        'role' => 'chefProjet',
                    ],
                    [
                        'firstName' => 'AChaou',
                        'lastName' => 'khalid',
                        'email' => 'khalid@gmail.com',
                        'password' => Hash::make('khalid@gmail.com'),
                        'role' => 'member',
                    ],
                    [
                        'firstName' => 'ADNAN',
                        'lastName' => 'ADNANO',
                        'email' => 'adnan@gmail.com',
                        'password' => Hash::make('adnan@gmail.com'),
                        'role' => 'member',
                    ],
                    [
                        'firstName' => 'Betrji',
                        'lastName' => 'Jalil',
                        'email' => 'jalil@gmail.com',
                        'password' => Hash::make('jalil@gmail.com'),
                        'role' => 'member',
                    ]
                ]);
    }
}
