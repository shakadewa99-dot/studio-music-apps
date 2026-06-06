@extends('layout.app')

@section('content')
<h2 class="text-white mb-4">Music Store - Katalog Alat Musik</h2>
<div class="row">
    @foreach($products as $product)
<div class="col-md-3">
    <div class="card bg-secondary text-white mb-3">
        <div class="card-body">
            <h5>{{ $product->nama_alat }}</h5>
            <p>Kategori: {{ $product->kategori }}</p>
            <p>Harga: Rp {{ number_format($product->harga) }}</p>
            
            {{-- FORM INI MENGIRIM DATA KE CARTCONTROLLER --}}
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary">Masukkan ke Keranjang</button>
            </form>
            
        </div>
    </div>
</div>
@endforeach