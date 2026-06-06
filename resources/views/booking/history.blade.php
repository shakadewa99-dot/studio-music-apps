@extends('layout.app')

@section('content')
<div class="container mt-4 text-white">
    <h2 class="fw-bold mb-4">Riwayat Booking Studio kamu</h2>

    @if(session('success'))
    <div class="alert alert-success border-0 text-dark" style="background-color: #d1e7dd;">
        🎉 {{ session('success') }}
    </div>
    @endif

    @if($bookings->isEmpty())
    <div class="card bg-dark text-secondary border-secondary p-5 text-center">
        <p class="mb-0">Kamu belum memiliki riwayat reservasi studio.</p>
    </div>
    @else
    <div class="table-responsive">
        <table class="table table-dark table-hover border-secondary vertical-middle">
            <thead class="text-danger fw-bold">
                <tr>
                    <th>Nama Band</th>
                    <th>Studio</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Durasi</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td class="fw-bold">{{ $booking->nama_band }}</td>
                    <td><span class="badge bg-secondary">{{ $booking->nama_studio }}</span></td>
                    <td>{{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}</td>
                    <td>{{ $booking->jam_mulai }} WIB</td>
                    <td>{{ $booking->durasi }} Jam</td>
                    <td class="text-warning fw-bold">
                        Rp {{ number_format($booking->durasi * $booking->harga_per_jam, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection