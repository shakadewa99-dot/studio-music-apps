<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem; // Mengambil data model keranjang
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // Tampilkan produk store beserta jumlah item di keranjang
    public function index()
    {
        $products = Product::all();
        
        // Hitung total quantity barang di keranjang milik user yang sedang login
        $cartCount = CartItem::where('user_id', auth()->id())->sum('quantity');
        
        return view('store.index', compact('products', 'cartCount'));
    }

    // Proses Beli Produk (Pengurangan Stok)
    public function buyProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->stok < 1) {
            return redirect()->back()->with('error', 'Stok barang sudah habis!');
        }

        // Kurangi stok sebanyak 1
        $product->decrement('stok', 1);

        // Menggunakan nama_alat agar sesuai dengan kolom database kamu
        return redirect()->back()->with('success', 'Berhasil membeli ' . $product->nama_alat . '! Stok berkurang.');
    }
}