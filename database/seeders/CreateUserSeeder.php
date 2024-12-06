<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Super Admin Hastha Club',
            'username' => 'superadmin',
            'email' => 'superadmin@hasthaclub.com',
            'no_hp' => '085487965123',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user1->assignRole([1]);

        $user2 = User::create([
            'name' => 'Admin Hastha Club',
            'username' => 'admin',
            'email' => 'admin@hasthaclub.com',
            'no_hp' => '085487965124',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user2->assignRole([2]);

        $user3 = User::create([
            'name' => 'Mitra Hastha Club',
            'username' => 'mitra',
            'email' => 'mitra@hasthaclub.com',
            'no_hp' => '085487465125',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user3->assignRole([3]);

        $user4 = User::create([
            'name' => 'Customer Hastha Club',
            'username' => 'customer',
            'email' => 'customer@hasthaclub.com',
            'no_hp' => '081487965329',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user4->assignRole([4]);

        $user5 = User::create([
            'name' => 'Sales Mitra Hastha Club',
            'username' => 'sales_mitra',
            'email' => 'sales_mitra@hasthaclub.com',
            'no_hp' => '081487965330',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user5->assignRole([5]);

        $user6 = User::create([
            'name' => 'Sales Toko Hastha Club',
            'username' => 'sales_to',
            'email' => 'sales_toko@hasthaclub.com',
            'no_hp' => '081487965331',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user6->assignRole([6]);

        $user7 = User::create([
            'name' => 'Mitra Hastha Club 2',
            'username' => 'mitra2',
            'email' => 'mitra2@hasthaclub.com',
            'no_hp' => '085487465122',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user7->assignRole([3]);
    }
}
