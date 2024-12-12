@extends('shop::layouts.app')
@section('cart-count')
    @if (@auth('customer')->user()->id)
        <span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection
@section('content')
<div class="grid xl:grid-cols-5 grid-cols-5 p-5">
    <div class="box "></div>
    <div class="box  xl:col-span-3 col-span-5  mt-5">
        <div class="grid grid-cols-1 text-start">
            <span class="text-3xl text-blue-500 font-bold"># {{ $invoice }} </span>
        </div>
        <div class="grid grid-cols-1 text-center mt-7">
            <span class="text-3xl text-blue-500 font-bold">Silahkan Lakukan Pembayaran</span>
        </div>
        <div class="grid grid-cols-1 text-center mt-3">
            <span class="text-3xl text-green-500 font-bold">Rp. {{ number_format($totalHarga, 0, ',', '.')  }}</span>
        </div>
        <div class="text-lg grid mt-3 text-center">
            <span>Segera melakukan pembayaran dengan metode transfer Bank ke nomor Rekening dibawah ini:</span>
        </div>
        <div class="text-lg grid mt-5 justify-center text-center">
            <span class=" text-2xl border p-2 h-12 w-[400px] shadow rounded-lg font-bold tracking-widest ">00312456789985 </span>
        </div>
        <div class="text-lg grid mt-3 text-center">
            <span class="text-2xl font-bold">A/N PT HANG MEDIATEK SETIAWAN</span>
        </div>
        <div class="text-lg grid mt-3 text-center">
            <span class="text-lg">Pembayaran diluar Rekening PT HANG MEDIATEK SETIAWAN bukan tanggungjawab dari HASTHA CLUB.</span>
        </div>
        <div class="text-lg grid mt-3 text-center">
            <span class="text-lg">Dan segera melakukan konfirmasi pembayaran supaya barang cepat untuk diproses.</span>
        </div>
        <div class="text-lg grid mt-10 mb-10">
            <div class="flex justify-center">
                <a href="{{route('checkout.konfirmasiPayment',  ['co_id' => $co_id ])}}">
                    <span class="inline-block px-6 py-2.5 border-2 bg-green-500 border-green-500 text-white font-semibold text-lg leading-tight rounded-full hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Konfirmasi Pembayaran</span>
                </a>
            </div>
        </div>
    </div>
    <div class="box "></div>
</div>
@endsection