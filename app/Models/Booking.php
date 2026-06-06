<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'nama_band',       // <--- PASTIKAN BARIS INI ADA
        'tanggal_booking',
        'jam_mulai',
        'durasi',
        'total_harga',
        'status',
        'studio_id',
        'user_id'
    ];
}