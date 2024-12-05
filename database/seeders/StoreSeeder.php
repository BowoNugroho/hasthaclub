<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'store_name' => 'Rhino Cell (Hastha Club)',
            'alamat' => 'superadmin',
            'jam_operasional' => '10:00 - 20:00 ',
            'mitra_id' => User::where('name', 'Mitra Hastha Club')->first()->id,
            'sales_mitra_id' => User::where('name', 'Sales Mitra Hastha Club')->first()->id,
            'status' => true
        ]);

        Store::create([
            'store_name' => 'Adi Cell (Hastha Club)',
            'alamat' => 'superadmin',
            'jam_operasional' => '10:00 - 21:00 ',
            'mitra_id' => User::where('name', 'Mitra Hastha Club 2')->first()->id,
            'sales_mitra_id' => User::where('name', 'Sales Mitra Hastha Club')->first()->id,
            'status' => true
        ]);
    }
}
