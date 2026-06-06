<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeatHouse - Daftar Akun</title>
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
        .register-card {
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
            margin-bottom: 30px;
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
            padding: 10px 15px;
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
        .btn-daftar {
            background-color: #0dcaf0;
            border: none;
            color: #000000;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 15px;
        }
        .btn-daftar:hover {
            background-color: #0baccc;
            color: #000000;
        }
        .link-login {
            display: block;
            text-align: center;
            color: #ffc107;
            text-decoration: none;
            margin-top: 20px;
            font-weight: 500;
        }
        .link-login:hover {
            text-decoration: underline;
            color: #e0a800;
        }
        .custom-alert-danger {
            background-color: #dc3545 !important;
            border: none !important;
            border-radius: 6px;
            color: #ffffff !important;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="brand-title">
        <i class="fa-solid fa-guitar"></i>BeatHouse Daftar
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

    <form action="/register" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label text-light small">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap anda" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-light small">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" value="{{ old('email') }}" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label text-light small">Password (Minimal 8 Karakter)</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" required>
        </div>

        <div class="mb-4">
            <label class="form-label text-light small">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password anda" required>
        </div>

        <button type="submit" class="btn btn-daftar">Daftar Sekarang</button>
    </form>

    <a href="{{ route('login') }}" class="link-login">Sudah punya akun? Login di sini</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>