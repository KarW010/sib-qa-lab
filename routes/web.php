<?php

use App\Support\ShopRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Hanya untuk eksperimen lokal (127.0.0.1). Jangan gunakan pada produksi.
Route::get('/qa/reset', function () {
    abort_unless(app()->environment('local'), 403);
    session()->forget(['cart', 'last_order']);
    return redirect('/');
});

Route::get('/', function () {
    $cart = session('cart', []);
    return view('shop', [
        'products' => ShopRules::products(),
        'cart' => $cart,
        'subtotal' => ShopRules::subtotal($cart),
    ]);
});

Route::post('/cart/add', function (Request $request) {
    $data = $request->validate([
        'product_id' => ['required', 'in:kopi,teh'],
        'quantity' => ['required', 'integer', 'min:1', 'max:99'],
    ], [
        'quantity.min' => 'Jumlah minimal 1',
        'quantity.integer' => 'Jumlah harus bilangan bulat',
        'quantity.max' => 'Jumlah maksimal 99',
    ]);
    $products = ShopRules::products();
    $id = $data['product_id'];
    $qty = (int) $data['quantity'];
    $cart = session('cart', []);
    $previous = (int) ($cart[$id] ?? 0);
    if ($qty + $previous > $products[$id]['stock']) {
        return redirect('/')->with('error', 'Stok tidak cukup');
    }
    $cart[$id] = $previous + $qty;
    session()->put('cart', $cart);
    return redirect('/')->with('message', 'Produk ditambahkan');
});

Route::post('/checkout', function () {
    $cart = session('cart', []);
    if (count($cart) === 0) {
        return redirect('/')->with('error', 'Keranjang kosong');
    }
    $subtotal = ShopRules::subtotal($cart);
    session()->put('last_order', ['subtotal' => $subtotal]);
    session()->forget('cart');
    return redirect('/')->with('message', 'Pesanan berhasil dibuat');
});
