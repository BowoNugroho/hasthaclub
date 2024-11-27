<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Shop</title>
        @vite('resources/css/app.css')
        {{-- @vite('resources/js/app.js') --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        {{-- Jangan di hapus --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" /> --}}
        {{-- End jangan dihapus --}}

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-shop', 'Resources/assets/sass/app.scss') }} --}}

    </head>
    <body>
        <div class="grid grid-cols-1 gap-2 ">
            <div class="flex items-center justify-center bg-blue-500 h-10 text-white text-[12px] py-2">Dapatkan Free Membership Paradigm Fitness s.d 1 bulan dengan Pembelian Produk Hastha Club</div>
        </div>
        <div class="grid grid-cols-7 gap-4">
            <div class="box"></div>
            <div class="box col-span-5 flex justify-center">
                <div class="flex justify-between items-center px-5 lg:px-[50px] h-[80px] w-full ">
                    <a href="/">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/hasthaclub.png') }}" class="h-[60px]" alt="">
                    </a>
                    <input type="text" placeholder="Cari Produk" class="w-[500px] pl-10 pr-4 py-2 text-gray-700  rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none  border border-gray-300 bg-gray-100" />
                    <ul class="flex gap-4">
                        <li class="text-[14px] hover:underline"><i class="fas fa-store"></i>Pilih Toko</li>
                        <li class="text-[14px] hover:underline">Partnership</li>
                        <li class="text-[14px] hover:underline">Reseller</li>
                    </ul>
                    <ul class="flex gap-4">
                        <li class="text-[14px]"><i class="fa-regular fa-user"></i></li>
                        <li class="text-[14px]"><i class="fa-solid fa-bag-shopping"></i></li>
                    </ul>
                </div>
            </div>
            <div class="box"></div>
        </div>
        <hr>
        @yield('content')
        <div class="h-[500px] mt-10"></div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>
