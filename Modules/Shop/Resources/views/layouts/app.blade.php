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
        <div class="grid grid-cols-1 gap-2">
            <div class="flex items-center justify-center bg-blue-500 lg:h-10 h-8 text-white lg:text-[12px] text-[10px] py-2 p-2">Dapatkan Free Membership Paradigm Fitness s.d 1 bulan dengan Pembelian Produk Hastha Club</div>
        </div>
        <div class="grid xl:grid-cols-7 grid-cols-7 gap-4">
            <div class="box "></div>
            <div class="box xl:col-span-5 col-span-7 justify-center hidden lg:flex">
                <div class="flex justify-between items-center px-5 lg:px-[50px] h-[80px] w-full ">
                    <a href="/">
                        <img src="{{ url('public/modules/shop/images/hasthaclub.png') }}" class="h-[60px]" alt="">
                    </a>
                    <input type="text" placeholder="Cari Produk" class="w-[500px] pl-10 pr-4 py-2 text-gray-700  rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none  border border-gray-300 bg-gray-100" />
                    <ul class="flex gap-4">
                        <li class="text-[14px] "><i class="fas fa-store"></i>&nbsp;&nbsp;<span class="hover:underline">Pilih Toko</span></li>
                        <li class="text-[14px] hover:underline">Partnership</li>
                        <li class="text-[14px] hover:underline">Reseller</li>
                    </ul>
                    <ul class="flex gap-4">
                        <li class="text-[14px]"><i class="fa-regular fa-user"></i></li>
                        <li class="text-[14px]"><i class="fa-solid fa-bag-shopping"></i></li>
                    </ul>
                </div>
            </div>
            <div class="box "></div>
        </div>
        <div class="lg:hidden px-2">
            <div class="grid grid-cols-1 text-center p-3 ">
                <p class="text-[15px] "><i class="fas fa-store"></i>&nbsp;&nbsp;<span class="hover:underline">Pilih Toko</span></p>
            </div>
            <hr>
            <div class="grid grid-cols-1 text-center p-1">
                <div class="flex justify-between items-center px-5 lg:px-[30px] h-[50px] w-full ">
                    <button id="menu-button" class="text-xl">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="/">
                        <img src="{{ url('public/modules/shop/images/hasthaclub.png') }}" class="h-[60px]" alt="">
                    </a>
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
            </div>
            <div id="mobile-menu" class="lg:hidden hidden">
                <hr>
                <div class="flex justify-between items-center px-5 lg:px-[50px] h-[80px] w-full ">
                    <input type="text" placeholder="Cari Produk" class="md:w-[500px] w-[200px] pl-10 pr-4 py-2 text-gray-700  rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none  border border-gray-300 bg-gray-100" />
                    <ul class="flex gap-4">
                        <li class="text-[14px] hover:underline">Partnership</li>
                        <li class="text-[14px] hover:underline">Reseller</li>
                    </ul>
                    <ul class="flex gap-4">
                        <li class="text-[14px]"><i class="fa-regular fa-user"></i></li>
                    </ul>
                </div>
                {{-- <div class=" left-0 flex flex-col gap-4 pt-5 px-5 absolute  w-[500px] h-screen bg-white"></div> --}}
            </div>
        </div>
        <hr>
        @yield('content')
        <hr>
        <div class="grid xl:grid-cols-9 grid-cols-9 gap-2 mb-5">
            <div class="box xl:col-span-2 "></div>
            <div class="box xl:col-span-5 col-span-9 p-5">
                <div class="hidden xl:grid">
                    <div class="grid grid-cols-4 gap-6 ">
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
                            <div class="grid grid-cols-1 text-start mb-3"> Cari Toko</div>
                        </div>
                        <div class="box ">
                            <div class="grid grid-cols-1 text-start text-lg font-bold mb-5"> Kebijakan</div>
                            <div class="grid grid-cols-1 text-start mb-3"> Syarat & Ketentuan </div>
                            <div class="grid grid-cols-1 text-start mb-3"> Pengembalian & Penukaran</div>
                            <div class="grid grid-cols-1 text-start mb-3"> Kebijakan Privasi</div>
                            <div class="grid grid-cols-1 text-start mb-3"> Akun Saya</div>
                        </div>
                    </div>
                </div>
                <div class="xl:hidden">
                    <button type="button" class="flex items-center w-full p-4 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Belanja</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                  </button>
                  <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Apple</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Android</a>
                        </li>
                  </ul>
                  <hr>
                    <button type="button" class="flex items-center w-full p-4 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                        <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Layanan</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                  </button>
                  <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Layanan Pelanggan</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mitra / Partnership</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Reseller</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Online Banking</a>
                        </li>
                  </ul>
                  <hr>
                    <button type="button" class="flex items-center w-full p-4 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                        <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Tentang</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                  </button>
                  <ul id="dropdown-example3" class="hidden py-2 space-y-2">
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tentang Hastha</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Hubungi Kami</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Cari Toko</a>
                        </li>
                  </ul>
                  <hr>
                    <button type="button" class="flex items-center w-full p-4 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example4" data-collapse-toggle="dropdown-example4">
                        <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Kebijakan</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                  </button>
                  <ul id="dropdown-example4" class="hidden py-2 space-y-2">
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Syarat & Ketentuan</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pengembalian & Penukaran</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kebijakan Privasi</a>
                        </li>
                        <li>
                           <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Akun Saya</a>
                        </li>
                  </ul>
                  <hr>
                </div>
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6 mt-10 mb-4">
                    <div class="box flex xl:justify-start justify-center lg:text-lg md:text-md text-sm">
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
                    <div class="box xl:text-start text-center">
                        <div class="flex xl:justify-start justify-center ">
                            <table>
                                <tr class="h-10">
                                    <td class="lg:text-lg md:text-md text-sm font-bold">Find Us</td>
                                </tr>
                                <tr class="h-10">
                                    <td class="lg:text-lg md:text-md text-sm">
                                        <i class="fa-brands fa-instagram"></i> &nbsp;&nbsp; <i class="fa-brands fa-facebook"></i> &nbsp;&nbsp; <i class="fa-brands fa-tiktok"></i>&nbsp;&nbsp; <i class="fa-brands fa-whatsapp"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="grid grid-cols-1 text-center mt-4">
                    <p class="text-slate-500 lg:text-lg md:text-md text-sm">Copyright © 2024 Hastha Club | PT Gayeon Industri Persada. All rights reserved.</p>
                </div>
            </div>
            <div class="box xl:col-span-2 "></div>
        </div>
        <script>
            // Toggle mobile menu visibility
            document.getElementById('menu-button').addEventListener('click', function() {
                let menu = document.getElementById('mobile-menu');
                console.log('masuk');
                menu.classList.toggle('hidden');
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>
