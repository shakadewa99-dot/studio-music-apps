<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['nama_alat' => 'Gitar Elektrik Fender', 'harga' => 5000000, 'stok' => 5, 'kategori' => 'Gitar'],
            ['nama_alat' => 'Drum Set Pearl', 'harga' => 8000000, 'stok' => 3, 'kategori' => 'Drum'],
            ['nama_alat' => 'Bass Yamaha', 'harga' => 3500000, 'stok' => 4, 'kategori' => 'Bass'],
            ['nama_alat' => 'Keyboard Roland', 'harga' => 6500000, 'stok' => 2, 'kategori' => 'Keyboard'],
        ]);
    }
}