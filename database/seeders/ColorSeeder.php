<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create([
            'color_name' => 'Space Gray',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Silver',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Gold',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Midnight',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Starlight',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Blue',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Green',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Purple',
            'deskripsi' => 'Phone',
            'status' => true
        ]);
    }
}
