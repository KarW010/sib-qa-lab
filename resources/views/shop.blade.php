<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIB QA Lab | PMPL</title>
  <style>
    body{font-family:Arial,sans-serif;max-width:880px;margin:20px auto;padding:0 20px;color:#243248;background:#fafbfe}
    h1{color:#193f75} .badge{background:#e4f1ff;padding:6px 10px;border-radius:7px}
    .item{display:flex;justify-content:space-between;align-items:center;gap:16px;background:#fff;border:1px solid #dbe3ed;border-radius:10px;padding:16px;margin:12px 0}
    input{width:70px;padding:8px}button{background:#205ea2;color:white;border:0;border-radius:6px;padding:9px 14px;cursor:pointer}
    .panel{background:white;border:1px solid #dbe3ed;border-radius:10px;padding:18px;margin:20px 0}
    .notice{padding:12px;border-radius:8px;margin:13px 0;background:#e3f4e9}.error{background:#ffe8e8}
  </style>
</head>
<body>
<h1>SIB Quality Assurance Lab</h1>
<p><span class="badge" id="team-label">Kelompok: K04</span> | Latihan lokal PMPL</p>
@if(session('message')) <div class="notice" role="status">{{ session('message') }}</div> @endif
@if(session('error')) <div class="notice error" role="alert">{{ session('error') }}</div> @endif
@if($errors->any()) <div class="notice error" role="alert">{{ $errors->first() }}</div> @endif
<h2>Daftar Produk</h2>
@foreach($products as $id => $product)
  <div class="item" data-testid="produk-{{ $id }}">
    <div><strong>{{ $product['name'] }}</strong><div>Rp {{ number_format($product['price'],0,',','.') }} | Stok {{ $product['stock'] }}</div></div>
    <form method="post" action="/cart/add">@csrf
      <input type="hidden" name="product_id" value="{{ $id }}">
      <label for="qty_{{ $id }}">Jumlah</label>
      <input id="qty_{{ $id }}" name="quantity" type="number" value="1" required>
      <button type="submit">Tambah {{ $id === 'kopi' ? 'Kopi' : 'Teh' }}</button>
    </form>
  </div>
@endforeach
<div class="panel" id="cart-panel">
  <h2>Keranjang Belanja</h2>
  @forelse($cart as $id => $qty)
    <div>{{ $products[$id]['name'] }} x {{ $qty }}</div>
  @empty
    <p>Belum ada produk</p>
  @endforelse
  <p id="subtotal"><strong>Subtotal: Rp {{ number_format($subtotal,0,',','.') }}</strong></p>
  <form action="/checkout" method="post">@csrf<button type="submit">Checkout Sekarang</button></form>
</div>
@if(session('last_order'))
  <div class="panel" id="last-order">Transaksi terakhir: Rp {{ number_format(session('last_order.subtotal'),0,',','.') }}</div>
@endif
<footer><small>Khusus pengujian lokal - tidak untuk publikasi</small></footer>
</body></html>
