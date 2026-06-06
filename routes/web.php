<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;

Route::get('/', function () { 
    return redirect('/booking'); 
});

// Rute Otentikasi (Auth)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // PERBAIKAN: Diubah ke POST

// Rute yang butuh Login (Diberi proteksi middleware 'auth')
Route::middleware(['auth'])->group(function () {
    
    // Rute Reservasi / Booking Studio
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');
    
    // Rute Katalog Music Store
    Route::get('/store', [StoreController::class, 'index'])->name('store.index');
    Route::post('/store/buy/{id}', [StoreController::class, 'buyProduct'])->name('store.buy');
    
    // Rute Manajemen Keranjang Belanja (Cart)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});