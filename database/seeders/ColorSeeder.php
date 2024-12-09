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
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Silver',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Gold',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Midnight',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Starlight',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Blue',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Green',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
        Color::create([
            'color_name' => 'Purple',
            'diskripsi' => 'Phone',
            'status' => true
        ]);
    }
}
