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
<<<<<<< HEAD
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
=======

    public function run(): void
    {
        $controllers = ['Projects', 'Tasks'];
>>>>>>> 258aaa4cfe1f64f7f2eba3d419b781203aebc9d0

        foreach ($controllers as $controller) {
            $this->createPermissionsForController($controller);
        }
    }

    private function createPermissionsForController($controller)
    {
<<<<<<< HEAD
        $actions = ['create', 'store', 'show', 'edit', 'update', 'destroy', 'index'];
=======
        $actions = ['index','create', 'store', 'show', 'edit', 'update', 'destroy'];
>>>>>>> 258aaa4cfe1f64f7f2eba3d419b781203aebc9d0
    
        foreach ($actions as $action) {
            $permissionName = $action . '-' . $controller . 'Controller';
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }
<<<<<<< HEAD
    
        // Add back the specific permission creation
        Permission::create(['name' => 'index-ProjectsController', 'guard_name' => 'web']);
        Permission::create(['name' => 'show-ProjectsController', 'guard_name' => 'web']);
=======
>>>>>>> 258aaa4cfe1f64f7f2eba3d419b781203aebc9d0
    }
}
