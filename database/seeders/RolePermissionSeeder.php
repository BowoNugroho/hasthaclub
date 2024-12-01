<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $viewDashboard = Permission::create(['name' => 'view dashboard']);
        $manageUsers = Permission::create(['name' => 'manage users']);

        $admin->givePermissionTo([$viewDashboard, $manageUsers]);
        $user->givePermissionTo([$viewDashboard]);
    }
}
