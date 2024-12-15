@extends('shop::layouts.app')

@section('title')
    Konfirmasi Pembayaran
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
<div class="grid xl:grid-cols-5 grid-cols-5 p-5">
    <div class="box "></div>
    <div class="box  xl:col-span-3 col-span-5  mt-5">
        <div class="grid grid-cols-1 text-start">
            <span class="xl:text-3xl lg:text-3xl md:text-2xl text-2xl text-blue-500 font-bold"># {{ $invoice }} </span>
        </div>
        <div class="grid grid-cols-1 text-center mt-7">
            <span class="xl:text-3xl lg:text-3xl md:text-2xl text-2xl text-blue-500 font-bold">Silahkan Lakukan Pembayaran</span>
        </div>
        <div class="grid grid-cols-1 text-center mt-3">
            <span class="xl:text-3xl lg:text-3xl md:text-2xl text-2xl text-green-500 font-bold">Rp. {{ number_format($totalHarga, 0, ',', '.')  }}</span>
        </div>
        <div class="xl:text-lg lg:text-lg md:text-md text-md grid mt-3 text-center">
            <span>Segera melakukan pembayaran dengan metode transfer Bank ke nomor Rekening dibawah ini:</span>
        </div>
        <div class="text-lg grid mt-5 justify-center text-center">
            <span class=" xl:text-2xl lg:text-2xl md:text-xl text-xl border p-2 h-12 xl:w-[400px] lg:w-[400px] md:w-[300px] w-[300px] shadow rounded-lg font-bold tracking-widest ">00312456789985 </span>
        </div>
        <div class="xl:text-lg lg:text-lg md:text-md text-md grid mt-3 text-center">
            <span class="xl:text-2xl lg:text-2xl md:text-xl text-xl font-bold">A/N PT HANG MEDIATEK SETIAWAN</span>
        </div>
        <div class="xl:text-lg lg:text-lg md:text-md text-md grid mt-3 text-center">
            <span class="xl:text-lg lg:text-lg md:text-md text-md">Pembayaran diluar Rekening PT HANG MEDIATEK SETIAWAN bukan tanggungjawab dari HASTHA CLUB.</span>
        </div>
        <div class="xl:text-lg lg:text-lg md:text-md text-md grid mt-3 text-center">
            <span class="xl:text-lg lg:text-lg md:text-md text-md">Dan segera melakukan konfirmasi pembayaran supaya barang cepat untuk diproses.</span>
        </div>
        <div class="xl:text-lg lg:text-lg md:text-md text-md grid mt-10 mb-10">
            <div class="flex justify-center">
                <a href="{{route('checkout.konfirmasiPayment',  ['co_id' => $co_id ])}}">
                    <span class="inline-block px-6 py-2.5 border-2 bg-green-500 border-green-500 text-white font-semibold xl:text-lg lg:text-lg md:text-md text-md leading-tight rounded-full hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Konfirmasi Pembayaran</span>
                </a>
            </div>
        </div>
    </div>
    <div class="box "></div>
</div>
@endsection