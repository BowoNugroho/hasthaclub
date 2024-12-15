@extends('shop::customer.dashboard')

@section('title')
    Riwayat
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

@section('content_customer')
    @if (@$dtCo == null)
        <div class="grid mt-10 text-center">
            <span class="text-orange-500 text-[50px] mb-5"><i class="fa-solid fa-circle-exclamation"></i></span>
            <span class="text-gray-500">Belum melakukan transaksi</span>
        </div>
        <div class="grid mt-5 text-center mb-10">
            <a href="{{ route('katalog') }}">
                <span class="text-blue-500 hover:underline">Mari belanja</span>
            </a>
        </div>
    @else
        @foreach($dtCo as $val)
        <div class="flex mt-3 justify-between">
            <span class="2xl:text-lg xl:text-lg lg:text-lg md:text-md sm:text-md text-sm"># {{$val->invoice}}</span>
            <span class="2xl:text-md xl:text-md lg:text-md md:text-sm sm:text-[12px] text-[12px]">Order Status :
            <span class="2xl:text-md xl:text-md lg:text-md md:text-[10px] sm:text-[10px] text-[10px] bg-orange-500 text-white  font-bold px-2 py-1 rounded-full">{{$val->order_status}}</span></span>
        </div>
        <div class="grid">
            <p class="2xl:text-md xl:text-md lg:text-md md:text-md sm:text-sm text-sm">Status Pembayaran : <span class="bg-orange-500 text-white 2xl:text-md xl:text-md lg:text-md md:text-sm sm:text-[12px] text-[12px] font-bold px-2 py-1 rounded-full"> {{ $val->status_pembayaran == 0 ? 'Belum' : 'Sudah' }}</span></p>
        </div>
        <div class="grid mt-2">
            <span class="2xl:text-md xl:text-md lg:text-md md:text-md sm:text-sm text-sm">Total Pembayaran : Rp. {{ number_format($val->total_harga, 0, ',', '.')  }}</span>
        </div>
        <div class="text-lg grid mt-7 mb-5">
            <div class="flex justify-center">
                @if ($val->status_pembayaran == 0)
                    <a href="{{route('checkout.paymentRek',  ['co_id' => $val->id ])}}">
                        <span class="inline-block px-2 py-2 border-2 bg-blue-500 border-blue-500 text-white font-semibold 2xl:text-sm xl:text-sm lg:text-sm md:text-[13px] text-[13px] leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Konfirmasi Pembayaran</span>
                    </a>
                @else
                    <span class="inline-block px-2 py-2 border-2 bg-green-500 border-green-500 text-white font-semibold 2xl:text-sm xl:text-sm lg:text-sm md:text-[13px] text-[13px] leading-tight rounded-full hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Telah Dibayar</span>
                @endif
            </div>
        </div>
        <hr>
        @endforeach
    @endif
@endsection