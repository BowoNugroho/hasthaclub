@extends('shop::layouts.app')
@section('cart-count')
@if (@auth('customer')->user()->id)
<span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
    {{ $cartCount ?? 0 }}
</span>
@endif
@endsection
@section('content')
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-3 p-10">
        <span class="text-3xl font-bold">RESELLER</span>
        <div class="grid mt-10">
            <p>Dapatkan keuntungan tambahan hingga puluhan juta setiap bulanya hanya dengan bergabung menjadi Reseller Hastha Club’s</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Mekanisme program :</span>
        </div>
        <div class="grid mt-5">
            <ul>
                <li>1. Mendaftar sebagai reseller</li>
                <li>2. Share katalog produk Hastha Club yang tersedia di website ke orang terdekat atau sosial media
                    milikmu.</li>
                <li>3. Mark up harga jual.</li>
                <li>4. Ajak/arahkan calon customer ke store Hastha Club terdekat dikotamu.</li>
                <li>5. Selesai, apabila transaksi berhasil maka mark up kamu akan dikirimkan ke nomor rekening milikmu.</li>
            </ul>
        </div>
        <div class="grid mt-5">
            <p>Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection