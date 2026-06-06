<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatHouse Music Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #121212; color: #ffffff; }
        .store-card { background-color: #1e1e1e; border: 1px solid #2d2d2d !important; border-radius: 8px; transition: transform 0.2s; }
        .store-card:hover { transform: translateY(-3px); }
        .img-container { background-color: #161616; height: 200px; display: flex; justify-content: center; align-items: center; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 20px; }
        .img-container img { max-height: 100%; max-width: 100%; object-fit: contain; }
        .btn-cyan { background-color: #0dcaf0; color: #000000; font-weight: bold; border: none; border-radius: 8px; padding: 10px 0; transition: 0.2s; }
        .btn-cyan:hover { background-color: #0baccc; color: #000000; }
        .beathouse-nav { background-color: #1a1a1a; border-bottom: 1px solid #2d2d2d; }
        .logout-btn { background: none; border: none; padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x); color: #6c757d; font-size: 0.95rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark beathouse-nav py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-danger fs-3" href="#">🎸 BeatHouse</a>
            <div class="navbar-nav ms-auto gap-3 align-items-center">
                <a class="nav-link text-secondary" href="/booking">Booking Studio</a>
                <a class="nav-link text-secondary" href="/booking/history">Riwayat Booking</a>
                <a class="nav-link active fw-bold text-info" href="/store">Music Store</a>
                <form action="/logout" method="POST" class="d-inline m-0">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h1 class="fw-bold text-info mb-1" style="font-size: 2.3rem;">BeatHouse Music Store</h1>
                <p class="text-secondary m-0">Temukan instrumen dan perlengkapan musik terbaik untuk performa band kamu.</p>
            </div>
            <div>
                <a href="/cart" class="btn btn-cyan px-4">🛒 {{ $cartCount }} Item</a>
            </div>
        </div>
        
        <hr class="border-secondary opacity-25 mb-5">

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 store-card border-0">
                        <div class="img-container">
                            @if(str_contains(strtolower($product->nama_alat), 'senar'))
                                <img src="{{ asset('images/senar.jpeg') }}" alt="Senar">
                            @elseif(str_contains(strtolower($product->nama_alat), 'pick'))
                                <img src="{{ asset('images/pick.jpeg') }}" alt="Pick">
                            @elseif(str_contains(strtolower($product->nama_alat), 'stick'))
                                <img src="{{ asset('images/stick.jpeg') }}" alt="Stick">
                            @elseif(str_contains(strtolower($product->kategori), 'gitar'))
                                <img src="{{ asset('images/gitar.png') }}" alt="Gitar">
                            @elseif(str_contains(strtolower($product->kategori), 'drum'))
                                @if($product->id == 5)
                                    <img src="{{ asset('images/drum.jpeg') }}" alt="Roland V-Drums">
                                @elseif($product->id == 7)
                                    <img src="{{ asset('images/dw_drum.jpg') }}" alt="Drum DW Akustik">
                                @else
                                    <img src="{{ asset('images/drum.jpeg') }}" alt="Drum">
                                @endif
                            @elseif(str_contains(strtolower($product->kategori), 'bass'))
                                <img src="{{ asset('images/bass.jpeg') }}" alt="Bass">
                            @elseif(str_contains(strtolower($product->kategori), 'keyboard'))
                                <img src="{{ asset('images/keyboard.jpeg') }}" alt="Keyboard">
                            @else
                                <img src="{{ asset('images/default.jpeg') }}" alt="Produk">
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <span class="badge bg-danger mb-3 align-self-start">{{ $product->kategori }}</span>
                            <h5 class="card-title fw-bold text-white mb-2 fs-5">{{ $product->nama_alat }}</h5>
                            <p class="card-text text-secondary small mb-4">Sisa stok: {{ $product->stok }} pcs.</p>
                            <div class="mt-auto">
                                <h4 class="fw-bold mb-3" style="color: #ffc107;">Rp {{ number_format($product->harga, 0, ',', '.') }}</h4>
                                <form action="/cart" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-cyan w-100">🛒 Masukkan ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>