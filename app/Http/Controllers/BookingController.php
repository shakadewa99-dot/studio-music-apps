<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // Menampilkan Form Sewa Studio
    public function index()
    {
        return view('booking.index');
    }

  public function store(Request $request)
{
    $request->validate([
        'nama_band' => 'required',
        'tanggal' => 'required|date',
        'jam_mulai' => 'required',
        'durasi' => 'required|integer',
        'studio_type' => 'required',
    ]);

    // 1. Cari data studio berdasarkan tipe dari form
    $studio = \Illuminate\Support\Facades\DB::table('studios')
                ->where('nama_studio', $request->studio_type)
                ->first();

    if (!$studio) {
        return back()->with('error', 'Tipe studio tidak valid!');
    }

    // 2. Cek jadwal bentrok menggunakan kolom 'tanggal_booking'
    $bentrok = \App\Models\Booking::where('studio_id', $studio->id)
        ->where('tanggal_booking', $request->tanggal)
        ->where('jam_mulai', $request->jam_mulai)
        ->exists();

    if ($bentrok) {
        return back()->with('error', 'Maaf, jadwal sudah di-booking orang lain pada jam tersebut!');
    }

    // Hitung total harga otomatis (Durasi x Harga Per Jam Studio)
    $totalHarga = $request->durasi * $studio->harga_per_jam;

    // 3. Simpan data lengkap ke database
    \App\Models\Booking::create([
        'nama_band'       => $request->nama_band,
        'tanggal_booking' => $request->tanggal,
        'jam_mulai'       => $request->jam_mulai,
        'durasi'          => $request->durasi,
        'total_harga'     => $totalHarga, // <--- PERBAIKAN: Mengisi field total_harga
        'status'          => 'Success',   // <--- Mengisi default status booking jika diperlukan
        'studio_id'       => $studio->id,
        'user_id'         => auth()->id(),
    ]);

    // 4. Alihkan ke halaman riwayat booking
    return redirect()->route('booking.history')->with('success', 'Booking Studio berhasil dibuat!');
}

    // Menampilkan Halaman Riwayat Booking
    public function history()
{
    // PERBAIKAN: Mengubah bookings::studio_id menjadi bookings.studio_id
    $bookings = Booking::where('user_id', auth()->id())
        ->join('studios', 'bookings.studio_id', '=', 'studios.id')
        ->select('bookings.*', 'studios.nama_studio', 'studios.harga_per_jam')
        ->orderBy('bookings.created_at', 'desc')
        ->get();

    return view('booking.history', compact('bookings'));
}
}