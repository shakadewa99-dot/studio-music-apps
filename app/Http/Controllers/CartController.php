<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller {
    
    // Tampilkan isi keranjang belanja
    public function index() {
        $items = CartItem::where('user_id', auth()->id())->get();
        return view('cart.index', compact('items'));
    }

    // Masukkan produk ke dalam keranjang
    public function store(Request $request) {
        CartItem::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => 1
        ]);
        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // FUNGSI BARU: Menghapus item dari keranjang belanja
    public function destroy($id) {
        // Cari item keranjang milik user yang sedang login
        $item = CartItem::where('user_id', auth()->id())->where('id', $id)->firstOrFail();
        
        // Hapus data dari database
        $item->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
    }
}