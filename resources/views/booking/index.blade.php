@extends('layout.app')

@section('content')
<div class="container mt-4 text-white">
    {{-- Alert Jadwal Bentrok --}}
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show border-0 text-dark" role="alert" style="background-color: #f8d7da;">
        ⚠️ Maaf, jadwal sudah di-booking orang lain pada jam tersebut!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Header Judul --}}
    <h1 class="fw-bold mb-1">Sewa Ruang Studio</h1>
    <p class="text-secondary mb-4">Pilih studio musik terbaik untuk latihan band atau rekaman proyekmu.</p>

    {{-- Grid Card Studio --}}
    <div class="row">
        {{-- Studio 1: Premium Rock --}}
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-secondary text-white" style="background-color: #1e1e1e;">
                <div class="card-body p-4">
                    <h3 class="text-danger fw-bold">Studio Premium Rock</h3>
                    <p class="text-secondary small">
                        Fasilitas: Marshall JCM2000, Drum Tama Hyperdrive, Bass Ampeg SVT, AC & Peredam Suara Standar Rekaman.
                    </p>
                    <h3 class="text-warning fw-bold mb-4">Rp 150.000 <span class="text-secondary fs-6 fw-normal">/ Jam</span></h3>

                    <h5 class="fw-bold mb-3 text-white border-bottom border-secondary pb-2">Form Reservasi Jadwal:</h5>
                    
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="studio_type" value="Premium Rock">
                        
                        <div class="mb-3">
                            <label class="text-secondary small mb-1">Pilih Tanggal</label>
                            <input type="date" name="tanggal" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="text-secondary small mb-1">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-secondary small mb-1">Durasi (Jam)</label>
                                <input type="number" name="durasi" min="1" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: 2" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="text-secondary small mb-1">Nama Band</label>
                            <input type="text" name="nama_band" class="form-control bg-dark text-white border-secondary" placeholder="Masukkan nama band kamu" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 fw-bold mt-2">Booking Sekarang</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Studio 2: Pop & Akustik --}}
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-secondary text-white" style="background-color: #1e1e1e;">
                <div class="card-body p-4">
                    <h3 class="text-danger fw-bold">Studio Pop & Akustik</h3>
                    <p class="text-secondary small">
                        Fasilitas: Keyboard Roland RD-88, Gitar Akustik Taylor, Drum Elektrik Roland, Keyboard Controller.
                    </p>
                    <h3 class="text-warning fw-bold mb-4">Rp 100.000 <span class="text-secondary fs-6 fw-normal">/ Jam</span></h3>

                    <h5 class="fw-bold mb-3 text-white border-bottom border-secondary pb-2">Form Reservasi Jadwal:</h5>
                    
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="studio_type" value="Pop & Akustik">
                        
                        <div class="mb-3">
                            <label class="text-secondary small mb-1">Pilih Tanggal</label>
                            <input type="date" name="tanggal" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="text-secondary small mb-1">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-secondary small mb-1">Durasi (Jam)</label>
                                <input type="number" name="durasi" min="1" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: 2" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="text-secondary small mb-1">Nama Band</label>
                            <input type="text" name="nama_band" class="form-control bg-dark text-white border-secondary" placeholder="Masukkan nama band kamu" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 fw-bold mt-2">Booking Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection