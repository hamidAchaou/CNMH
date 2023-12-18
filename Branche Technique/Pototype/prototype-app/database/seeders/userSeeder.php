<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
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


        // Call permissions from PermissionSeeder
        $projectLeaderRole->givePermissionTo($leaderPermissions);

        $projectLeader = User::create([
            'name' => 'Chef de projet',
            'email' => 'project.leader@solicode.com',
            'role' => 'project-leader',
            'password' => Hash::make('leader'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $projectLeaderRole->givePermissionTo($leaderPermissions);
        $projectLeader->assignRole($projectLeaderRole);

        
        $superAdmin = User::create([
                'name' => 'Super Admin',
                'email' => 'Super.Admin@gmail.com',
                'role' => 'Super Admin',
                'password' => Hash::make('Super.Admin'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);
        $superAdminRole->givePermissionTo($leaderPermissions);
        $superAdmin->assignRole($superAdminRole);
        $superAdmin->assignRole($projectLeaderRole);


        $member = User::create([
            'name' => 'membre',
                'email' => 'membre@solicode.com',
                'role' => 'member',
                'password' => Hash::make('membre'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);
        $member->assignRole($memberRole);

        $permissions = [
            'index-ProjectsController',
            'index-TasksController',
            'index-MembersController',
            'getTasksByProject-TasksController',
        ];
        
        $member->givePermissionTo($permissions);
        
    }
}
