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
            'password' => bcrypt('Bismillah')
        ]);
         
        $user->assignRole([1]);

        $user2 = User::create([
            'name' => 'User Hastha Club', 
            'username' => 'user',
            'email' => 'user@hasthaclub.com',
            'password' => bcrypt('Bismillah')
        ]);
         
        $user2->assignRole([2]);
    }
}
