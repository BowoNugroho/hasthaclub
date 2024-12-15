@extends('shop::layouts.app')

@section('title')
    Dashboard 
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
<div class="grid 2xl:grid-cols-6 xl:grid-cols-6 lg:grid-cols-6 md:grid-cols-6  mt-2">
<div class="box col-span-1"></div>
<div class="box col-span-4 p-5 ">
    <nav>
        <div class=" flex flex-wrap items-center justify-center mx-auto p-4">
            <div class="items-center justify-between  w-full  md:w-auto md:order-1" id="navbar-user">
                <ul class="flex  font-medium p-4 md:p-0 mt-3   rounded-lg  md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white ">
                <li>
                    <a href="{{ route('dashboardCs') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Informasi Akun</a>
                </li>
                <li>
                    <a href="{{ route('riwayatCs') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Riwayat Transaksi</a>
                </li>
                <li>
                    <form action="{{ route('logoutCs') }}" method="POST" >
                        @csrf
                        <button type="submit" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 " onclick="confirmLogout()"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</button>
                    </form>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <hr>
    @yield('content_customer')
</div>
<div class="box col-span-1"></div>
</div>
@endsection