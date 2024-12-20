@extends('shop::layouts.app')

@section('title')
    Tentang Hastha
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
        <span class="xl:text-3xl lg:text-3xl md:text-2xl text-2xl font-bold">TENTANG HASTHA</span>
        <div class="grid mt-10 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Hastha Club adalah jaringan retail yang terintegrasi baik secara offline maupun online yang menjual produk premium Apple beserta turunanya.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Hastha Club menawarkan pengalaman belanja yang luar biasa dengan memberikan banyak promo dan
                program menarik yang dapat dinikmati oleh semua pelanggan dari semua kalangan.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Belanja secara offline dan dapatkan barang impianmu secara langsung dengan ketentuan harga normal.
                Belanja secara online dan dapatkan barang impianmu 3-7 hari kerja dengan ketentuan harga promo.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">PT Gayeon Industri Persada </span>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <ul>
                <li>KOLEKTIF</li>
                <li>Jl. Watu gede No.58, Sariharjo, Ngaglik, SLeman, Daerah Istimewa Yogyakarta 55581</li>
                <li>WhatsApp: <span class="text-blue-500">0882 0089 97382</span></li>
                <li>Email: <span class="text-blue-500">cs@hasthaclub.com</span></li>
            </ul>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection