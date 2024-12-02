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
        $shop = Role::create(['name' => 'shop']);
        $user = Role::create(['name' => 'user']);

        $viewDashboard = Permission::create(['name' => 'view dashboard']);
        $manageUsers = Permission::create(['name' => 'manage users']);
        $manageShops = Permission::create(['name' => 'manage shops']);

        $admin->givePermissionTo([$viewDashboard, $manageUsers, $manageShops]);
        $shop->givePermissionTo([$viewDashboard]);
        $user->givePermissionTo([$viewDashboard]);
    }
}
