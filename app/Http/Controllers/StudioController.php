<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Booking;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    // 1. Tampilkan Daftar Studio Musik
    public function index()
    {
        $studios = Studio::all();
        return view('studio.index', compact('studios'));
    }

    // 2. Fitur Proses Simpan Booking
    public function storeBooking(Request $request)
    {
        $request->validate([
            'studio_id' => 'required',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required',
            'durasi' => 'required|integer|min:1',
        ]);

        $jam_mulai = $request->jam_mulai;
        $jam_selesai = date('H:i:s', strtotime($jam_mulai . " + {$request->durasi} hours"));

        $bentrok = Booking::where('studio_id', $request->studio_id)
            ->where('tanggal_booking', $request->tanggal_booking)
            ->where(function ($query) use ($jam_mulai, $jam_selesai) {
                $query->whereBetween('jam_mulai', [$jam_mulai, $jam_selesai])
                      ->orWhereRaw('? BETWEEN jam_mulai AND DATE_ADD(jam_mulai, INTERVAL durasi HOUR)', [$jam_mulai]);
            })->exists();

        if ($bentrok) {
            return redirect()->back()->with('error', 'Maaf, jadwal sudah di-booking orang lain pada jam tersebut!');
        }

        $studio = Studio::findOrFail($request->studio_id);
        $total_harga = $studio->harga_per_jam * $request->durasi;

        Booking::create([
            'user_id' => 1, 
            'studio_id' => $request->studio_id,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_mulai' => $request->jam_mulai,
            'durasi' => $request->durasi,
            'total_harga' => $total_harga,
            'status' => 'Pending'
        ]);

        return redirect()->back()->with('success', 'Booking sukses dibuat! Total bayar: Rp ' . number_format($total_harga, 0, ',', '.'));
    }

    // 3. Fitur Tampilkan Riwayat Booking User
    public function history()
    {
        // Mengambil data booking yang digabung (join) dengan data studio berdasarkan user_id = 1
        $bookings = Booking::select('bookings.*', 'studios.nama_studio', 'studios.harga_per_jam')
            ->join('studios', 'studios.id', '=', 'bookings.studio_id')
            ->where('bookings.user_id', 1)
            ->orderBy('bookings.created_at', 'desc')
            ->get();

        return view('studio.history', compact('bookings'));
    }
}