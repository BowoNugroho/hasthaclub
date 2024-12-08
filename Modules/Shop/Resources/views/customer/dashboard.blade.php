@extends('shop::layouts.app')

@section('content')
<div class="grid xl:grid-cols-8 lg:grid-cols-6 md:grid-cols-4 grid-cols-1 mt-2">
<div class="box  xl:col-span-3 lg:col-span-2"></div>
<div class="box lg:col-span-2 md:col-span-2 p-5 ">
    <nav>
        <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4">
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
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
<div class="box xl:col-span-3 lg:col-span-2"></div>
</div>
@endsection