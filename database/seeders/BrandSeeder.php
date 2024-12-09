<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'brand_name' => 'Apple',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Brand::create([
            'brand_name' => 'Samsung',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Brand::create([
            'brand_name' => 'Oppo',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Brand::create([
            'brand_name' => 'Vivo',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
    }
}
