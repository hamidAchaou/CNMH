<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'firstName' => 'hamid',
            'lastName' => 'Achaou',
            'email' => 'hamid@solicode.com',
            'password' => Hash::make('hamid@solicode.com'),
        ]);
    }
}
