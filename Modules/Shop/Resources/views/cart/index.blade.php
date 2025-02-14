@extends('shop::layouts.app')

@section('title')
    Keranjang Belanja
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
<div class="grid 2xl:grid-cols-5 xl:grid-cols-5 grid-cols-5 p-5">
    <div class="box "></div>
    <div class="box  2xl:col-span-3 xl:col-span-5 col-span-5 p-3">
        <div class="flex  justify-between mb-5">
            <span class="2xl:text-3xl xl:text-2xl lg:text-2xl text-xl font-bold">Keranjang</span>
            <a href="{{ route('katalog') }}">
                <span class="text-blue-500 lg:text-lg hover:underline">Lanjut belanja</span>
            </a>
        </div>
        <div class="hidden md:grid">
            <div class="grid grid-cols-4 mb-3">
                <div class="box col-span-2 text-start">Produk</div>
                <div class="box text-end">Jumlah</div>
                <div class="box text-end">Total</div>
            </div>
        </div>
        <hr>
        @if($products == null)
        <div class="grid grid-cols-1 mb-5 mt-10" >
            <div class="box  text-center">
                <span class="text-xl text-gray-500 ">Belum ada product yang masuk</span>
            </div>
        </div>
        @else
        @foreach ($products as $val)
        <div class="hidden md:grid">
            <div class="grid grid-cols-4 mb-3 mt-10"  id="cart-item-{{ $val->id }}" >
                <div class="box col-span-2 ">
                    <div class="grid grid-cols-3">
                        <div class="box flex justify-center ">
                            <img src="{{ url('public/storage/'. $val->product_variants_img1) }}" class="lg:h-[100px] h-[70px]" alt="">
                        </div>
                        <div class="box col-span-2">
                            <div class="grid">
                                <span class="text-xl font-bold hover:underline">{{ $val->product_name }} {{ $val->capacity_name }} {{ $val->color_name }}</span>
                                <span class="text-[12px] text-gray-500">Kapasitas :  {{ $val->capacity_name }}</span>
                                <span class="text-[12px] text-gray-500">Warna : {{ $val->color_name }}</span>
                                <span class="text-[12px] text-gray-500">Model : {{ $val->product_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box text-end">
                    <div class="grid justify-end">
                        <span>{{ $val->qty }}</span>
                        <button data-id="{{ $val->id }}" class="text-blue-500 hover:underline btn-deleteCart">
                            <span id="buttonHapusCartText{{ $val->id }}">Hapus</span>
                            <div role="status" id="loadingSpinnerHapusCart{{ $val->id }}" style="display: none;">
                                <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="box text-end font-bold"><span>Rp.{{ number_format($val->total_harga, 0, ',', '.')  }}</span></div>
            </div>
        </div>
        <hr>
        @endforeach
        @foreach ($products as $val)
        <div class="md:hidden">
            <div class="grid grid-cols-1 mb-3 mt-10"  id="cart2-item-{{ $val->id }}" >
                <div class="box grid">
                    <div class="grid grid-cols-1">
                        <div class="box flex justify-between">
                            <span class="md:text-xl text-lg font-bold hover:underline">{{ $val->product_name }} {{ $val->capacity_name }} {{ $val->color_name }}</span>
                            <span class="font-bold">{{ $val->qty }}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5">
                        <div class="box grid justify-center">
                            <img src="{{ url('public/storage/'. $val->product_variants_img1) }}" class="h-[250px]" alt="">
                        </div>
                    </div>
                    <div class="grid mt-5">
                        <span class="text-[12px] text-gray-500">Kapasitas :  {{ $val->capacity_name }}</span>
                        <span class="text-[12px] text-gray-500">Warna : {{ $val->color_name }}</span>
                        <span class="text-[12px] text-gray-500">Model : {{ $val->product_name }}</span>
                    </div>
                    <div class="grid grid-cols-1 mt-5">
                        <div class="box flex justify-between font-bold">
                            <span>Rp.{{ number_format($val->total_harga, 0, ',', '.')  }}</span>
                            <button data-id="{{ $val->id }}" class="text-blue-500 hover:underline btn-deleteCart2">
                                <span id="buttonHapusCartText2{{ $val->id }}">Hapus</span>
                                <div role="status" id="loadingSpinnerHapusCart2{{ $val->id }}" style="display: none;">
                                    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        <hr>
        @endforeach
        @endif
        <div class="hidden md:grid">
            <div class="grid grid-cols-1 mt-7">
                <div class="flex justify-between">
                    <span class="text-xl font-bold text-gray-500">Ringkasan belanja </span>
                    <span id="total-price" class="text-xl font-bold ">Total Pembayaran : Rp.{{ number_format($totalHarga, 0, ',', '.')  }}</span>
                    @if($products == null)
                        <button class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 " disabled>Checkout</button>
                    @else
                    <form action="{{ route('checkout',$cart_id) }}" method="GET">
                        @csrf
                        <button class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Checkout</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="md:hidden">
            <div class="grid grid-cols-1 mt-6">
                <span class="md:text-xl text-lg font-bold text-gray-500">Ringkasan belanja </span>
                <span id="total-price2" class="md:text-xl text-lg font-bold ">Total Pembayaran : Rp.{{ number_format($totalHarga, 0, ',', '.')  }}</span>
                <div class="grid grid-cols-1 mt-3">
                    <div class="box flex justify-center">
                        @if($products == null)
                            <button class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 " disabled>Checkout</button>
                        @else
                        <form action="{{ route('checkout',$cart_id) }}" method="GET">
                            @csrf
                            <button class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Checkout</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box "></div>
</div>
@endsection
@include('shop::cart.js')