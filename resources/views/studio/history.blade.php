@extends('layout.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold text-white">Riwayat Booking Kamu</h2>
        <p class="text-muted">Pantau status jadwal latihan band dan total pembayaran administrasi studio di sini.</p>
    </div>
</div>

<div class="card shadow">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead>
                    <tr class="text-secondary border-bottom border-secondary">
                        <th class="p-3">Nama Studio</th>
                        <th class="p-3">Tanggal Main</th>
                        <th class="p-3">Jam Mulai</th>
                        <th class="p-3">Durasi</th>
                        <th class="p-3">Total Bayar</th>
                        <th class="p-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr class="border-bottom border-secondary" style="border-color: #2d2d2d !important;">
                        <td class="p-3 fw-bold text-danger">{{ $booking->nama_studio }}</td>
                        <td class="p-3 text-white">{{ date('d M Y', strtotime($booking->tanggal_booking)) }}</td>
                        <td class="p-3 text-white-50">{{ date('H:i', strtotime($booking->jam_mulai)) }} WIB</td>
                        <td class="p-3 text-white-50">{{ $booking->durasi }} Jam</td>
                        <td class="p-3 text-warning fw-bold">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                        <td class="p-3 text-center">
                            @if($booking->status == 'Pending')
                                <span class="badge bg-warning text-dark px-3 py-2 fw-bold">⏳ PENDING</span>
                            @else
                                <span class="badge bg-success px-3 py-2 fw-bold">🟢 DISETUJUI</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-5 text-muted">
                            <p class="fs-5 mb-2">Belum ada riwayat pemesanan studio.</p>
                            <a href="{{ route('studio.index') }}" class="btn btn-outline-danger btn-sm mt-2 fw-bold">Booking Sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection