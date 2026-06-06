<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Pastikan semua kolom yang kamu gunakan di Tinker terdaftar di sini
    protected $fillable = [
        'kategori', 
        'nama_alat', 
        'stok', 
        'harga'
    ];
}