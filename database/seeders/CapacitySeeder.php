<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Capacity;

class CapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Capacity::create([
            'capacity_name' => '64 GB',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Capacity::create([
            'capacity_name' => '128 GB',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Capacity::create([
            'capacity_name' => '256 GB',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Capacity::create([
            'capacity_name' => '512 GB',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Capacity::create([
            'capacity_name' => '1 Tera',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
    }
}
