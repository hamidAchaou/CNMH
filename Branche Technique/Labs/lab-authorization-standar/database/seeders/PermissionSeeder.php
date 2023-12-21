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
    // public function run(): void
    // {
    //     Permission::create(['name' => 'index-TasksController', 'guard_name' => 'web']);
    //     Permission::create(['name' => 'show-TasksController', 'guard_name' => 'web']);
    //     Permission::create(['name' => 'create-TasksController', 'guard_name' => 'web']);
    //     Permission::create(['name' => 'store-TasksController', 'guard_name' => 'web']);
    //     Permission::create(['name' => 'edit-TasksController', 'guard_name' => 'web']);
    //     Permission::create(['name' => 'update-TasksController', 'guard_name' => 'web']);
    //     Permission::create(['name' => 'destroy-TasksController', 'guard_name' => 'web']);
    // }

    public function run(): void
    {
        $controllers = ['Tasks'];

        foreach ($controllers as $controller) {
            $this->createPermissionsForController($controller);
        }
    }

    private function createPermissionsForController($controller)
    {
        $actions = ['create', 'store', 'show', 'edit', 'update', 'destroy', 'index'];
    
        foreach ($actions as $action) {
            $permissionName = $action . '-' . $controller . 'Controller';
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }
    
        // Add back the specific permission creation
        Permission::create(['name' => 'index-ProjectsController', 'guard_name' => 'web']);
        Permission::create(['name' => 'show-ProjectsController', 'guard_name' => 'web']);
    }
}
