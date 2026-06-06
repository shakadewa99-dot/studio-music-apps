<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BeatHouse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #ffffff;
        }
        .beathouse-nav {
            background-color: #1a1a1a;
            border-bottom: 1px solid #2d2d2d;
        }
        .cart-card {
            background-color: #1e1e1e;
            border: 1px solid #2d2d2d !important;
            border-radius: 8px;
        }
        .btn-cyan {
            background-color: #0dcaf0;
            color: #000000;
            font-weight: bold;
            border: none;
            border-radius: 6px;
        }
        .btn-cyan:hover {
            background-color: #0baccc;
            color: #000000;
        }
        .logout-btn {
            background: none;
            border: none;
            padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark beathouse-nav py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger fs-3" href="#">
                🎸 BeatHouse
            </a>
            <div class="navbar-nav ms-auto gap-3 align-items-center">
                <a class="nav-link text-secondary" href="/booking">Booking Studio</a>
                <a class="nav-link text-secondary" href="/booking/history">Riwayat Booking</a>
                <a class="nav-link text-secondary" href="/store">Music Store</a>
                
                <form action="/logout" method="POST" class="d-inline m-0">
                    @csrf
                    <button type="submit" class="nav-link text-secondary logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-info mb-1">🛒 Keranjang Belanja Anda</h1>
                <p class="text-secondary m-0">Kelola item perlengkapan musik yang ingin Anda proses atau bayar.</p>
            </div>
            <div>
                <a href="/store" class="btn btn-outline-light px-4">← Kembali ke Store</a>
            </div>
        </div>

        <hr class="border-secondary opacity-25 mb-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show bg-success-subtle border-success text-success-emphasis mb-4" role="alert">
                ✨ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($items->isEmpty())
            <div class="text-center py-5 my-5">
                <h3 class="text-secondary mb-3">Keranjang belanja Anda masih kosong nih...</h3>
                <a href="/store" class="btn btn-cyan px-4 py-2">Mulai Belanja Alat Musik</a>
            </div>
        @else
            <div class="card cart-card p-4">
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle m-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama Produk / Alat Musik</th>
                                <th>Kuantitas</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <span class="badge bg-danger px-2.5 py-1.5" style="border-radius: 4px; font-size: 0.9rem;">
                                            {{ $item->product ? $item->product->nama_alat : 'Produk ID: '.$item->product_id }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-warning">{{ $item->quantity }} pcs</span>
                                    </td>
                                    <td>
                                        <form action="/cart/{{ $item->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>