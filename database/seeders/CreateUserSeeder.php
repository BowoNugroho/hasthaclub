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
        $user = User::create([
            'name' => 'Admin Hastha Club',
            'username' => 'admin',
            'email' => 'admin@hasthaclub.com',
            'no_hp' => '085487965124',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user->assignRole([1]);

        $user2 = User::create([
            'name' => 'Shop Hastha Club',
            'username' => 'shop',
            'email' => 'shop@hasthaclub.com',
            'no_hp' => '085487465125',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user2->assignRole([2]);

        $user3 = User::create([
            'name' => 'User Hastha Club',
            'username' => 'user',
            'email' => 'user@hasthaclub.com',
            'no_hp' => '081487965329',
            'password' => bcrypt('Bismillah'),
            'status' => true
        ]);

        $user3->assignRole([3]);
    }
}
