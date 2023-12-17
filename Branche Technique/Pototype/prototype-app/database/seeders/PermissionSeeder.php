<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controllers = ['Projects', 'Tasks', 'Members'];

        foreach ($controllers as $controller) {
            $this->createPermissionsForController($controller);
        }
    }

    private function createPermissionsForController($controller)
    {
        $actions = ['create', 'store', 'show', 'edit', 'update', 'destroy', 'index', 'import', 'export', 'getTasksByProject'];
    
        foreach ($actions as $action) {
            $permissionName = $action . '-' . $controller . 'Controller';
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }
    
        // Add back the specific permission creation
        // Permission::create(['name' => 'getTasksByProject-TasksController', 'guard_name' => 'web']);
    }
    
}
