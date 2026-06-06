<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatHouse - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121416;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background-color: #212529;
            border: 1px solid #343a40;
            border-radius: 8px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        }
        .brand-title {
            color: #dc3545;
            font-weight: 700;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 35px;
        }
        .brand-title i {
            margin-right: 8px;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            background-color: #6c757d;
            border: 1px solid #6c757d;
            color: #ffffff;
            padding: 12px 15px;
            border-radius: 6px;
        }
        .form-control:focus {
            background-color: #5a6268;
            border-color: #dc3545;
            color: #ffffff;
            box-shadow: none;
        }
        .form-control::placeholder {
            color: #adb5bd;
        }
        .btn-masuk {
            background-color: #dc3545;
            border: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        .btn-masuk:hover {
            background-color: #c82333;
            color: #ffffff;
        }
        .link-daftar {
            display: block;
            text-align: center;
            color: #ffc107;
            text-decoration: none;
            margin-top: 20px;
            font-weight: 500;
        }
        .link-daftar:hover {
            text-decoration: underline;
            color: #e0a800;
        }
        
        /* Notifikasi Error */
        .custom-alert-danger {
            background-color: #dc3545 !important;
            border: none !important;
            border-radius: 6px;
        }
        .custom-alert-danger, 
        .custom-alert-danger ul, 
        .custom-alert-danger ul li {
            color: #ffffff !important;
            font-weight: 500;
        }
        
        /* Notifikasi Sukses Pendaftaran Akun */
        .custom-alert-success {
            background-color: #198754 !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 6px;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-title">
        <i class="fa-solid fa-guitar"></i>BeatHouse Login
    </div>

    @if ($errors->any())
        <div class="alert custom-alert-danger py-2 px-3 small mb-4 shadow-sm">
            <ul class="mb-0 ps-1" style="list-style-type: none;">
                @foreach ($errors->all() as $error)
                    <li><i class="fa-solid fa-circle-exclamation me-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert custom-alert-success py-2 px-3 small mb-4 shadow-sm">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label text-light small">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" value="{{ old('email') }}" required>
        </div>
        
        <div class="mb-4">
            <label class="form-label text-light small">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required>
        </div>

        <button type="submit" class="btn btn-masuk">Masuk Sekarang</button>
    </form>

    <a href="{{ route('register') }}" class="link-daftar">Daftar di sini</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>