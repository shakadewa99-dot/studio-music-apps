@extends('layout.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h2 class="fw-bold text-white">Sewa Ruang Studio</h2>
        <p class="text-muted">Pilih studio musik terbaik untuk latihan band atau rekaman proyekmu.</p>
    </div>
</div>

<div class="row">
    @foreach($studios as $studio)
    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h4 class="card-title text-danger fw-bold mb-2">{{ $studio->nama_studio }}</h4>
                    <p class="card-text text-secondary small mb-3" style="line-height: 1.6;">{{ $studio->deskripsi }}</p>
                    <h5 class="text-warning fw-bold mb-4">
                        Rp {{ number_format($studio->harga_per_jam, 0, ',', '.') }} 
                        <span class="fs-6 text-muted fw-normal">/ Jam</span>
                    </h5>
                </div>
                
                <div class="border-top border-secondary pt-3">
                    <h6 class="text-white mb-3 fw-bold">Form Reservasi Jadwal:</h6>
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="studio_id" value="{{ $studio->id }}">
                        
                        <div class="mb-3">
                            <label class="form-label text-muted small">Pilih Tanggal</label>
                            <input type="date" name="tanggal_booking" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label text-muted small">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control bg-dark text-white border-secondary" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label text-muted small">Durasi (Jam)</label>
                                <input type="number" name="durasi" class="form-control bg-dark text-white border-secondary input-durasi" data-harga="{{ $studio->harga_per_jam }}" min="1" max="12" placeholder="Contoh: 2" required>
                            </div>
                        </div>

                        <div class="mb-3 p-2 rounded bg-opacity-10 bg-warning text-warning text-center fw-bold d-none label-total-harga">
                            Estimasi Total: Rp <span class="total-nilai">0</span>
                        </div>
                        
                        <button type="submit" class="btn btn-danger w-100 fw-bold py-2 shadow-sm">Amankan Jadwal Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputsDurasi = document.querySelectorAll('.input-durasi');

        inputsDurasi.forEach(input => {
            input.addEventListener('input', function () {
                const cardBody = this.closest('.card-body');
                const hargaPerJam = parseInt(this.getAttribute('data-harga'));
                const durasi = parseInt(this.value);
                const labelTotal = cardBody.querySelector('.label-total-harga');
                const totalNilai = cardBody.querySelector('.total-nilai');

                if (durasi > 0) {
                    const totalHarga = hargaPerJam * durasi;
                    // Format mata uang rupiah
                    totalNilai.textContent = totalHarga.toLocaleString('id-ID');
                    labelTotal.classList.remove('d-none');
                } else {
                    labelTotal.classList.add('d-none');
                }
            });
        });
    });
</script>
@endsection