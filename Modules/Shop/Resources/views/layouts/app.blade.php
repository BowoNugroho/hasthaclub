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
        <hr>
        <div class="grid grid-cols-9 gap-2 mb-5">
            <div class="box col-span-2"></div>
            <div class="box col-span-5 p-5">
                <div class="grid grid-cols-4 gap-6">
                    <div class="box "> 
                        <div class="grid grid-cols-1 text-start text-lg font-bold mb-5"> Belanja</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Apple</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Andorid</div>
                    </div>
                    <div class="box ">
                        <div class="grid grid-cols-1 text-start text-lg font-bold mb-5"> Layanan</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Layanan Pelanggan</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Mitra / Partnership</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Reseller</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Online Banking</div>
                    </div>
                    <div class="box ">
                        <div class="grid grid-cols-1 text-start text-lg font-bold mb-5"> Tentang</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Tentang Hastha</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Hubungi Kami</div>
                        <div class="grid grid-cols-1 text-start mb-3"> FAQ</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Cari Toko</div>
                    </div>
                    <div class="box ">
                        <div class="grid grid-cols-1 text-start text-lg font-bold mb-5"> Kebijakan</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Kebijakan Pembelian </div>
                        <div class="grid grid-cols-1 text-start mb-3"> Kebijakan Pengembalian</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Kebijakan Privasi</div>
                        <div class="grid grid-cols-1 text-start mb-3"> Akun Saya</div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 mt-10 mb-4">
                    <div class="box ">
                        <table>
                            <tr class="h-10">
                                <td><i class="fa-regular fa-clock"></i> &nbsp;&nbsp;</td>
                                <td>Jam  09:00 - 18:00</td>
                            </tr>
                            <tr class="h-10">
                                <td><i class="fa-regular fa-envelope"></i> &nbsp;&nbsp;</td>
                                <td>Email : <span class="text-blue-500">customercare@hasthaclub.com</span></td>
                            </tr>
                            <tr class="h-10">
                                <td><i class="fa-solid fa-headset"></i> &nbsp;&nbsp;</td>
                                <td>Contact Center : <span class="text-blue-500">1500378</span></td>
                            </tr>
                            <tr class="h-10">
                                <td><i class="fa-brands fa-whatsapp"></i> &nbsp;&nbsp;</td>
                                <td>Whatsapp : <span class="text-blue-500">0882 0089 97382</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="box ">
                        <table>
                            <tr class="h-10">
                                <td class="text-lg font-bold">Find Us</td>
                            </tr>
                            <tr class="h-10">
                                <td>
                                    <i class="fa-brands fa-instagram"></i> &nbsp;&nbsp; <i class="fa-brands fa-facebook"></i> &nbsp;&nbsp; <i class="fa-brands fa-tiktok"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="grid grid-cols-1 text-center mt-4">
                    <p class="text-slate-500">Copyright © 2024 Hastha Club | PT Gayeon Industri Persada. All rights reserved.</p>
                </div>
            </div>
            <div class="box col-span-2"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>
