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
        <span class="text-3xl font-bold">TENTANG HASTHA</span>
        <div class="grid mt-10">
            <p>Hastha Club adalah jaringan retail yang terintegrasi baik secara offline maupun online yang menjual produk premium Apple beserta turunanya.</p>
        </div>
        <div class="grid mt-5">
            <p>Hastha Club menawarkan pengalaman belanja yang luar biasa dengan memberikan banyak promo dan
                program menarik yang dapat dinikmati oleh semua pelanggan dari semua kalangan.</p>
        </div>
        <div class="grid mt-5">
            <p>Belanja secara offline dan dapatkan barang impianmu secara langsung dengan ketentuan harga normal.
                Belanja secara online dan dapatkan barang impianmu 3-7 hari kerja dengan ketentuan harga promo.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">HMS Group </span>
        </div>
        <div class="grid mt-5">
            <ul>
                <li>KOLEKTIF</li>
                <li>Jl. Watu gede No.58, Sariharjo, Ngaglik, SLeman, Daerah Istimewa Yogyakarta 55581</li>
                <li>WhatsApp: <span class="text-blue-500">0882 0089 97382</span></li>
                <li>Email: <span class="text-blue-500">cs@hasthaclub.com</span></li>
            </ul>
        </div>
        <div class="grid mt-5">
            <p>Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection