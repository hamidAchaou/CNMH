<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'index-TasksController',
            'show-TasksController',
            'create-TasksController',
            'store-TasksController',
            'edit-TasksController',
            'update-TasksController',
            'destroy-TasksController',
        ];
    
        foreach ($permissions as $permissionName) {
            $existingPermission = Permission::where('name', $permissionName)->where('guard_name', 'web')->first();
    
            if (!$existingPermission) {
                Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }
    }
    
}
