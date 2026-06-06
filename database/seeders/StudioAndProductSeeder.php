<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudioAndProductSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan pengecekan foreign key agar aman saat membersihkan tabel
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('users')->truncate();
        DB::table('studios')->truncate();
        DB::table('products')->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Insert User Dummy
        DB::table('users')->insert([
            'name' => 'Shaka Dewa',
            'email' => 'shaka@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Insert Data Master Studio
        DB::table('studios')->insert([
            [
                'nama_studio' => 'Premium Rock',
                'harga_per_jam' => 150000,
                'deskripsi' => 'Fasilitas: Marshall JCM2000, Drum Tama Hyperdrive, Bass Ampeg SVT, AC & Peredam Suara Standar Rekaman.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_studio' => 'Pop & Akustik',
                'harga_per_jam' => 100000,
                'deskripsi' => 'Fasilitas: Keyboard Roland RD-88, Gitar Akustik Taylor, Drum Elektrik Roland, Keyboard Controller.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Insert Data Katalog Produk (Disesuaikan dengan kolom 'nama_alat' dan 'kategori')
        DB::table('products')->insert([
            [
                'nama_alat' => 'Senar Gitar Ernie Ball 0.10',
                'harga'     => 95000,
                'stok'      => 15,
                'kategori'  => 'Aksesoris Gitar',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama_alat' => 'Stick Drum Vater Goodwood 5A',
                'harga'     => 85000,
                'stok'      => 8,
                'kategori'  => 'Aksesoris Drum',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama_alat' => 'Pick Gitar Fender Medium (Pack)',
                'harga'     => 30000,
                'stok'      => 20,
                'kategori'  => 'Aksesoris Gitar',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}