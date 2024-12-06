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
            'alamat' => 'Plaza Ambarrukmo Jl. Laksda Adisucipto Yogyakarta 55281',
            'kota' => 'Kota Yogyakarta',
            'provinsi' => 'Daerah Istimewa Yogyakarta',
            'jam_operasional' => '10:00 - 20:00',
            'mitra_id' => User::where('name', 'Mitra Hastha Club')->first()->id,
            'sales_mitra_id' => User::where('name', 'Sales Mitra Hastha Club')->first()->id,
            'status' => true
        ]);

        Store::create([
            'store_name' => 'Adi Cell (Hastha Club)',
            'alamat' => 'Jalan Kaliurang KM 5 CT III, RT.CT III/RW No.: 27, Karang Wuni, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281',
            'kota' => 'Kabupaten Sleman',
            'provinsi' => 'Daerah Istimewa Yogyakarta',
            'jam_operasional' => '10:00 - 21:00 ',
            'mitra_id' => User::where('name', 'Mitra Hastha Club 2')->first()->id,
            'sales_mitra_id' => User::where('name', 'Sales Mitra Hastha Club')->first()->id,
            'status' => true
        ]);

        Store::create([
            'store_name' => 'Wm Cell (Hastha Club)',
            'alamat' => 'Jl. Raya Magelang, KM 6 No. 18 Kutu Patran Sinduadi Kec. Mlati Kab. Sleman DIY 55284, Jogja City Mall Lantai UG unit 38',
            'kota' => 'Kabupaten Sleman',
            'provinsi' => 'Daerah Istimewa Yogyakarta',
            'jam_operasional' => '10:00 - 22:00 ',
            'mitra_id' => User::where('name', 'Mitra Hastha Club 2')->first()->id,
            'sales_mitra_id' => User::where('name', 'Sales Mitra Hastha Club')->first()->id,
            'status' => true
        ]);
    }
}
