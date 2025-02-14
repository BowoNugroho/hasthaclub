<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RolePermissionSeeder::class]);
        $this->call([CreateUserSeeder::class]);
        $this->call([StoreSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([BrandSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([ColorSeeder::class]);
        $this->call([CapacitySeeder::class]);
    }
}
