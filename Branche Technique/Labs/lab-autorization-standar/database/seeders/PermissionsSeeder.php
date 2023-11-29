<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create_project']);
        Permission::create(['name' => 'show_project']);
        Permission::create(['name' => 'edit_project']);
        Permission::create(['name' => 'update_project']);
        Permission::create(['name' => 'udelete_project']);
    }
}
