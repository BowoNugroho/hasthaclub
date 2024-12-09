<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => 'Handphone',
            'deskripsi' => 'Phone',
            'status' => true
        ]);

        Category::create([
            'category_name' => 'Laptop',
            'deskripsi' => 'Laptop',
            'status' => true
        ]);
        Category::create([
            'category_name' => 'SmartWacth',
            'deskripsi' => 'SmartWacth',
            'status' => true
        ]);
    }
}
