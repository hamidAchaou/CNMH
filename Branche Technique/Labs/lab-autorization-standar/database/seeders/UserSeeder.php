<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'project',
            'lastName' => 'leader',
            'email' => 'leader.project@gmail.com',
            'password' => Hash::make('leader.project@gmail.com'),
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('leader.project');

        User::create([
            'firstName' => 'member',
            'lastName' => 'member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('member@gmail.com'),
            'created_at' => now(),
            'updated_at' => now()
        ])->givePermissionTo('create_project');

    }
}
