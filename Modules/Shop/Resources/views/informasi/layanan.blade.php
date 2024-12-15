@extends('shop::layouts.app')

@section('title')
    Layanan Pelanggan
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
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-3 p-10">
        <span class="text-3xl font-bold">LAYANAN PELANGGAN</span>
        <div class="grid mt-5">
            <ul>
                <li class="font-bold">The Hastha Club’s customer care :</li>
                <li>Email: <span class="text-blue-500">cs@hasthaclub.com</span></li>
                <li>Whatsapp: <span class="text-blue-500">0882 0089 97382</span></li>
                <li>Instagram: <span class="text-blue-500">HasthaClub</span></li>
            </ul>
        </div>
        <div class="grid mt-5">
            <p>Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection