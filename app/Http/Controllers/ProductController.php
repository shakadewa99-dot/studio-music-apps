<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan Model Product sudah di-use

class ProductController extends Controller
{
    // Fungsi ini wajib ada
    public function index()
    {
        $products = Product::all(); // Mengambil semua data produk
        return view('products.index', compact('products')); // Mengirim ke view
    }
}