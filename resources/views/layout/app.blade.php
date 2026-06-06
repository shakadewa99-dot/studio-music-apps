<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatHouse Studio & Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #121212; color: #e0e0e0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card { background-color: #1e1e1e; border: 1px solid #2d2d2d; color: #ffffff; border-radius: 12px; }
        .navbar { background-color: #1a1a1a !important; border-bottom: 2px solid #333; }
        .btn-danger { background-color: #dc3545; border: none; }
        .btn-danger:hover { background-color: #bd2130; }
        .btn-info { background-color: #0dcaf0; border: none; color: #000; }
        .btn-info:hover { background-color: #0baccc; color: #000; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4 shadow" style="background-color: #1a1a1a;">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger fs-3" href="{{ route('booking.index') }}">🎸 BeatHouse</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-indicator"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('booking') ? 'active fw-bold text-danger' : '' }}" href="{{ route('booking.index') }}">Booking Studio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('booking/history') ? 'active fw-bold text-warning' : '' }}" href="{{ route('booking.history') }}">Riwayat Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('store') ? 'active fw-bold text-info' : '' }}" href="{{ route('store.index') }}">Music Store</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white border-0" style="background: none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Daftar</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✨ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ⚠️ {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>