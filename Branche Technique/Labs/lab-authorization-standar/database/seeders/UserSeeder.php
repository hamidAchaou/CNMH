<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     User::create([
    //         'name' => 'Chef de projet',
    //         'email' => 'project.leader@solicode.com',
    //         'password' => Hash::make('leader'),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ])->assignRole('project-leader');

    //     User::create([
    //         'name' => 'membre',
    //         'email' => 'membre@solicode.com',
    //         'password' => Hash::make('member'),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ])->assignRole('member');
    // }

    public function run(): void
    {
       $user =  User::create([
            'name' => 'Chef de projet',
            'email' => 'project.leader@solicode.com',
            'password' => Hash::make('leader'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->assignRole('project-leader');

        User::create([
            'name' => 'membre',
                'email' => 'membre@solicode.com',
                'password' => Hash::make('membre'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ])->assignRole('member');
        
    }
}
