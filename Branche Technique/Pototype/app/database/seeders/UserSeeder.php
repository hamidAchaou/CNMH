<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $leaderPermissions = Permission::pluck('name')->toArray();
        

    $projectLeaderRole = Role::findByName('project-leader');
    $memberRole = Role::findByName('member');
    $superAdminRole = Role::findByName('Super Admin');
    

    // Create users
    $projectLeader = User::create([
        'name' => 'Chef de projet',
        'email' => 'project.leader@solicode.com',
        'password' => Hash::make('leader'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);
    $projectLeader->assignRole($projectLeaderRole);
    // $projectLeader->givePermissionTo($leaderPermissions);

    $superAdmin = User::create([
        'name' => 'Super Admin',
        'email' => 'Super.Admin@gmail.com',
        'password' => Hash::make('Super.Admin'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);
    $superAdmin->assignRole($superAdminRole);

    $user = User::create([
        'name' => 'membre',
        'email' => 'membre@solicode.com',
        'password' => Hash::make('membre'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);
    $user->assignRole($memberRole);
    // $user->givePermissionTo('create-TasksController');
}
}

