<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Shop</title>
        @vite('resources/css/app.css')
       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-shop', 'Resources/assets/sass/app.scss') }} --}}

    </head>
    <body>
        <div class="grid grid-cols-1 gap-4 mb-5">
            <div class="flex items-center justify-center bg-blue-500 h-7 text-white text-[10px] ">Dapatkan Free Membership Paradigm Fitness s.d 1 bulan dengan Pembelian Produk Hastha Club</div>
        </div>
        @yield('content')

        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-shop', 'Resources/assets/js/app.js') }} --}}
    </body>
</html>
