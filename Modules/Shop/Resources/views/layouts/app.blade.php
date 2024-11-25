<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Shop</title>
        @vite('resources/css/app.css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-shop', 'Resources/assets/sass/app.scss') }} --}}

    </head>
    <body>
        <div class="grid grid-cols-1 gap-4 mb-20">
            <div class="flex items-center justify-center bg-blue-500 h-10 text-white text-[12px] py-2">Dapatkan Free Membership Paradigm Fitness s.d 1 bulan dengan Pembelian Produk Hastha Club</div>
            <div class="flex justify-between items-center px-5 lg:px-[300px]  h-[155px] w-full fixed">
                <img src="{{ Vite::asset('modules/shop/Resources/assets/images/hasthaclub.png') }}" class="h-[60px]" alt="">
                <input type="text" placeholder="Cari Produk" class="w-[500px] pl-10 pr-4 py-2 text-gray-700  rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none  border border-gray-300 bg-gray-100" />
                <ul class="flex gap-4">
                    <li class="text-[14px]"><i class="fas fa-store"></i> Pilih Toko</li>
                    <li class="text-[14px]">Partnership</li>
                    <li class="text-[14px]">Reseller</li>
                </ul>
                <ul class="flex gap-4">
                    <li class="text-[14px]"><i class="fa-regular fa-user"></i></li>
                    <li class="text-[14px]"><i class="fa-solid fa-bag-shopping"></i></li>
                </ul>
            </div>
        </div>
        <hr>
        {{-- @yield('content') --}}

        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-shop', 'Resources/assets/js/app.js') }} --}}
    </body>
</html>
