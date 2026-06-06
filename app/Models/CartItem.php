<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Tambahkan relasi ke produk agar kita bisa mengambil nama alat musiknya nanti
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}