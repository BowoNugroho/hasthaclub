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
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $mitra = Role::create(['name' => 'mitra']);
        $customer = Role::create(['name' => 'customer']);
        $sales_mitra = Role::create(['name' => 'sales_mitra']);
        $sales_to = Role::create(['name' => 'sales_to']);

        $viewDashboard = Permission::create(['name' => 'view dashboard']);
        $manageUsers = Permission::create(['name' => 'manage users']);
        $manageShops = Permission::create(['name' => 'manage shops']);

        $superadmin->givePermissionTo([$viewDashboard, $manageUsers, $manageShops]);
        $admin->givePermissionTo([$viewDashboard, $manageUsers, $manageShops]);
        $mitra->givePermissionTo([$viewDashboard]);
        $customer->givePermissionTo([$viewDashboard]);
        $sales_mitra->givePermissionTo([$viewDashboard]);
        $sales_to->givePermissionTo([$viewDashboard]);
    }
}
