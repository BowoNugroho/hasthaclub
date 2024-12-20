@extends('shop::layouts.app')

@section('title')
    Partnership
@endsection

@section('cart-count')
    @if (@auth('customer')->user()->id)
        <span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>                                                     
    @endif
@endsection
@section('cart-count2')
    @if (@auth('customer')->user()->id)
        <span id="cart-count2" class="cart-count bg-blue-500  text-white w-4 h-4   text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection

@section('content')
<div class="grid xl:grid-cols-5 lg:grid-cols-7 grid-cols-5">
    <div class="box"></div>
    <div class="box xl:col-span-3 lg:col-span-5 col-span-5 p-10">
        <span class="xl:text-3xl lg:text-3xl md:text-2xl text-2xl font-bold">PARTNERSHIP</span>
        <div class="grid mt-10 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Bergabung menjadi bagian dari perjalanan luar biasa kami dalam program kemitraan <span class="font-bold">Hastha Club Strategic
                Partnership (HCSP)</span> dan dapatkan banyak keuntunganya.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Tentang Program : <span class="font-bold">Hastha Club Strategic Partnership (HCSP)</span> merupakan program kemitraan yang dibangun oleh PT Gayeon Industri Persada dalam rangka pemenuhan dalam pelayanan pelanggan. Program kemitraan ini menawarkan kerjasama antara PT Gayeon Industri Persada dengan pemilik store/konter dalam penyediaan tempat untuk penempatan standing banner dan penggunaan alamat store/konter untuk pelayanan customer.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Keuntungan Program :</span>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <ul>
                <li>1. Royalti sebesar <span class="font-bold">Rp 200.000 </span> untuk setiap transaksi sukses.</li>
                <li>2. Marketing gratis.</li>
                <li>3. Pelanggan baru untuk pembelian smartphone.</li>
                <li>4. Pelanggan baru untuk pembelian aksesoris dll.</li>
            </ul>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection