@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-1 gap-4">
    <div id="default-carousel" class="relative w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <img src="{{ Vite::asset('modules/shop/Resources/assets/images/slider/slide1.png') }}" class="absolute block lg:h-[400px] md:h-[400px] h-[300px]  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ Vite::asset('modules/shop/Resources/assets/images/slider/slide2.jpg') }}" class="absolute blocklg:h-[400px] md:h-[400px] h-[300px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ Vite::asset('modules/shop/Resources/assets/images/slider/slide3.jpg') }}" class="absolute blocklg:h-[400px] md:h-[400px] h-[300px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ Vite::asset('modules/shop/Resources/assets/images/slider/slide4.jpg') }}" class="absolute blocklg:h-[400px] md:h-[400px] h-[300px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ Vite::asset('modules/shop/Resources/assets/images/slider/slide5.jpg') }}" class="absolute blocklg:h-[400px] md:h-[400px] h-[300px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/10 dark:bg-gray-800/30 group-hover:bg-black/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/10 dark:bg-gray-800/30 group-hover:bg-black/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>
<hr>
<div class="grid xl:grid-cols-7 grid-cols-7 gap-2">
    <div class="box"> </div>
    <div class="box xl:col-span-5 col-span-7 p-5"> 
        <p class="text-[25px] font-bold">Type produk Hastha</p>
        <div class="flex justify-center gap-16 mt-3 ">
            <a href="#" class="max-auto p-3">
                <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/katalog/ip 13.png') }}" class="lg:h-[80px] h-[50px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <p class="font-bold lg:text-lg md:text-md text-sm">Apple</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <p class="lg:text-lg md:text-md text-sm">Mulai 3 Jutaan</p>
                    </div>
                 </div>
            </a>
            <a href="#" class="max-auto p-3">
                <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/katalog/samsung.png') }}" class="lg:h-[80px] h-[50px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <p class="font-bold lg:text-lg md:text-md text-sm">Android</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <p class="lg:text-lg md:text-md text-sm">Mulai 2 Jutaan</p>
                    </div>
                 </div>
            </a>
            <a href="#" class="max-auto p-3">
                <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/katalog/laptop.png') }}" class="lg:h-[80px] h-[50px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <p class="font-bold lg:text-lg md:text-md text-sm">Laptop</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-center">
                        <p class="lg:text-lg md:text-md text-sm">Mulai 4 Jutaan</p>
                    </div>
                 </div>
            </a>
        </div>
    </div>
    <div class="box"></div>
</div>
<hr>
<div class="grid xl:grid-cols-7 grid-cols-7 gap-2 mb-5">
    <div class="box"></div>
    <div class="box xl:col-span-5 col-span-7 p-5">
        <p class="text-[25px] font-bold">Produk Best Seller</p>
        <div class="flex justify-center gap-5 mt-10">
            <a href="#" class="max-auto p-3 border rounded-lg shadow h-[350px] w-[260px]">
                <div class="grid grid-cols-1 mb-7 mt-5">
                    <div class="flex justify-center ">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/terbaru/iphone14.png') }}" class="h-[150px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-start">
                        <p class="font-bold text-orange-500">Best Seller</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-start">
                        <p class="text-[25px]">iPhone 14</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-start">
                        <p class="text-[11px]">Mulai Rp12.999.000</p>
                    </div>
                 </div>
            </a>
            <a href="#" class="max-auto p-3 border rounded-lg shadow h-[350px] w-[260px]">
                <div class="grid grid-cols-1 mb-7 mt-5">
                    <div class="flex justify-center ">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/terbaru/iphone14.png') }}" class="h-[150px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-start">
                        <p class="font-bold text-orange-500">Best Seller</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-start">
                        <p class="text-[25px]">iPhone 14</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-start">
                        <p class="text-[11px]">Mulai Rp12.999.000</p>
                    </div>
                 </div>
            </a>
            <a href="#" class="max-auto p-3 border rounded-lg shadow h-[350px] w-[260px]">
                <div class="grid grid-cols-1 mb-7 mt-5">
                    <div class="flex justify-center ">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/terbaru/iphone14.png') }}" class="h-[150px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-start">
                        <p class="font-bold text-orange-500">Best Seller</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-start">
                        <p class="text-[25px]">iPhone 14</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-start">
                        <p class="text-[11px]">Mulai Rp12.999.000</p>
                    </div>
                 </div>
            </a>
            <a href="#" class="max-auto p-3 border rounded-lg shadow h-[350px] w-[260px]">
                <div class="grid grid-cols-1 mb-7 mt-5">
                    <div class="flex justify-center ">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/terbaru/iphone14.png') }}" class="h-[150px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-start">
                        <p class="font-bold text-orange-500">Best Seller</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-start">
                        <p class="text-[25px]">iPhone 14</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-start">
                        <p class="text-[11px]">Mulai Rp12.999.000</p>
                    </div>
                 </div>
            </a>
            <a href="#" class="max-auto p-3 border rounded-lg shadow h-[350px] w-[260px]">
                <div class="grid grid-cols-1 mb-7 mt-5">
                    <div class="flex justify-center ">
                        <img src="{{ Vite::asset('modules/shop/Resources/assets/images/terbaru/iphone14.png') }}" class="h-[150px]" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1">
                    <div class="flex justify-start">
                        <p class="font-bold text-orange-500">Best Seller</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-start">
                        <p class="text-[25px]">iPhone 14</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-start">
                        <p class="text-[11px]">Mulai Rp12.999.000</p>
                    </div>
                 </div>
            </a>
        </div>
    </div>
    <div class="box"></div>
</div>
<hr>
<div class="grid XL:grid-cols-7 grid-cols-7 gap-2 mb-5">
    <div class="box"></div>
    <div class="box xl:col-span-5 col-span-7 p-5">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 px-2 gap-3">
            <div class="box  p-14">
                <div class="grid grid-cols-1 text-slate-400 lg:text-[50px] md:text-[40px] text-[35px] text-center"><i class="fa-solid fa-headset"></i></div>
                <div class="grid grid-cols-1 text-center font-bold lg:text-2xl md:text-xl text-lg mt-5">Dapatkan Pelayanan yang Profesional</div>
                <div class="grid grid-cols-1 text-center lg:text-[12px] md:text-[11px] text-[10px] mt-5">Kami selalu berkomitmen untuk memberikan pelayanan yang profesional, cepat, dan terpercaya untuk setiap kebutuhan Anda.</div>
            </div>
            <div class="box  p-14">
                <div class="grid grid-cols-1 text-blue-300 lg:text-[50px] md:text-[40px] text-[35px] text-center"><i class="fa-solid fa-money-check-dollar"></i></div>
                <div class="grid grid-cols-1 text-center font-bold lg:text-2xl md:text-xl text-lg mt-5">Jaminan Pembayaran dengan Aman</div>
                <div class="grid grid-cols-1 text-center lg:text-[12px] md:text-[11px] text-[10px] mt-5">Kami memberikan jaminan pembayaran yang aman dan terpercaya, sehingga Anda dapat berbelanja dengan tenang dan tanpa kekhawatiran.</div>
            </div>
            <div class="box  p-14">
                <div class="grid grid-cols-1 text-slate-400 lg:text-[50px] md:text-[40px] text-[35px] text-center"><i class="fa-solid fa-cart-shopping"></i></div>
                <div class="grid grid-cols-1 text-center font-bold lg:text-2xl md:text-xl text-lg mt-5">Pesan Sekarang, ambil di toko</div>
                <div class="grid grid-cols-1 text-center lg:text-[12px] md:text-[11px] text-[10px] mt-5">Pesan barang dengan tenang tanpa harus memikirankan barang tidak dikirim.</div>
            </div>
        </div>
    </div>
    <div class="box"></div>
</div>
<hr>
<div class="grid XL:grid-cols-7 grid-cols-7 gap-2 mb-5">
    <div class="box"></div>
    <div class="box xl:col-span-5 col-span-7 p-5">
        <p class="text-[25px] font-bold">Our Partner</p>
        <div class="grid lg:grid-cols-5 md:grid-cols-3 mt-6">
            <div class="box  lg:col-span-2 col-span-1 text-center lg:text-7xl md:text-6xl text-5xl text-blue-500 "><i class="fa-solid fa-street-view"></i></div>
            <div class="box  lg:col-span-3 md:col-span-2">
                <div class="grid grid-cols-1 lg:text-3xl md:text-2xl text-xl  font-bold lg:mt-0 md:mt-0 mt-3">Cari Toko Terdekat</div>
                <div class="grid grid-cols-1 lg:text-[14px] md:text-[12px] text-[10px] mt-2">"Temukan toko terdekat dan nikmati pengalaman belanja yang lebih mudah dan cepat!"</div>
                <div class="grid grid-cols-1 mt-4">
                    <a href="#" class="inline-block px-6 py-2.5 border-2 lg:w-[115px] md:w-[100px]  w-[100px] border-blue-500 text-blue-500 font-semibold lg:text-sm md:text-[10px] text-[10px] leading-tight rounded-full hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Cari Toko 
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="box"></div>
</div>
<hr>
<div class="grid xl:grid-cols-5 grid-cols-5 gap-2 mb-5">
    <div class="box"></div>
    <div class="box xl:col-span-3 col-span-5 p-8">
        <p class="text-[30px] font-bold flex justify-center tracking-widest text-lg">Checkout Sekarang</p>
        <div class="flex justify-center gap-5 mt-10">    
            <div class=" relative w-full max-w-4xl ">
                <!-- Slider -->
                <div class="carousel-container overflow-hidden">
                    <!-- Carousel Inner -->
                    <div class="carousel-inner flex transition-transform duration-500 ease-in-out" id="carousel">
                        <!-- Item 1 -->
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2" id="carousel-items">
                            <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                                <div class="flex justify-center ">
                                    <img src="{{ Vite::asset('modules/shop/Resources/assets/images/checkout/applewacth1.png') }}" class="h-[200px]" alt="">
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mb-6">
                                <div class="flex justify-center">
                                    <p class="font-bold text-[18px]">Apple Wacth</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-1">
                                <div class="flex justify-center">
                                    <p class="text-[18px] text-slate-400 line-through">Rp 15.999.000</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 ">
                                <div class="flex justify-center">
                                    <p class="text-[18px]">Rp 12.999.000  <span class="text-red-500 text-[15px]">20 %</span></p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-3">
                                <div class="flex justify-center">
                                    {{-- <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button> --}}

                                    <a href="#" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                            <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                                <div class="flex justify-center ">
                                    <img src="{{ Vite::asset('modules/shop/Resources/assets/images/checkout/applewacth2.png') }}" class="h-[200px]" alt="">
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mb-6">
                                <div class="flex justify-center">
                                    <p class="font-bold text-[18px]">Apple Wacth</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-1">
                                <div class="flex justify-center">
                                    <p class="text-[18px] text-slate-400 line-through">Rp 15.999.000</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 ">
                                <div class="flex justify-center">
                                    <p class="text-[18px]">Rp 12.999.000  <span class="text-red-500 text-[15px]">20 %</span></p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-3">
                                <div class="flex justify-center">
                                    {{-- <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button> --}}

                                    <a href="#" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Beli Sekarang
                                    </a>
                                </div>
                             </div>
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                            <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                                <div class="flex justify-center ">
                                    <img src="{{ Vite::asset('modules/shop/Resources/assets/images/checkout/applewacth3.png') }}" class="h-[200px]" alt="">
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mb-6">
                                <div class="flex justify-center">
                                    <p class="font-bold text-[18px]">Apple Wacth</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-1">
                                <div class="flex justify-center">
                                    <p class="text-[18px] text-slate-400 line-through">Rp 15.999.000</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 ">
                                <div class="flex justify-center">
                                    <p class="text-[18px]">Rp 12.999.000  <span class="text-red-500 text-[15px]">20 %</span></p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-3">
                                <div class="flex justify-center">
                                    {{-- <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button> --}}

                                    <a href="#" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Beli Sekarang
                                    </a>
                                </div>
                             </div>
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                            <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                                <div class="flex justify-center ">
                                    <img src="{{ Vite::asset('modules/shop/Resources/assets/images/checkout/applewacth4.png') }}" class="h-[200px]" alt="">
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mb-6">
                                <div class="flex justify-center">
                                    <p class="font-bold text-[18px]">Apple Wacth</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-1">
                                <div class="flex justify-center">
                                    <p class="text-[18px] text-slate-400 line-through">Rp 15.999.000</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 ">
                                <div class="flex justify-center">
                                    <p class="text-[18px]">Rp 12.999.000  <span class="text-red-500 text-[15px]">20 %</span></p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-3">
                                <div class="flex justify-center">
                                    {{-- <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button> --}}

                                    <a href="#" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Beli Sekarang
                                    </a>
                                </div>
                             </div>
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                            <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                                <div class="flex justify-center ">
                                    <img src="{{ Vite::asset('modules/shop/Resources/assets/images/checkout/applewacth2.png') }}" class="h-[200px]" alt="">
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mb-6">
                                <div class="flex justify-center">
                                    <p class="font-bold text-[18px]">Apple Wacth</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-1">
                                <div class="flex justify-center">
                                    <p class="text-[18px] text-slate-400 line-through">Rp 15.999.000</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 ">
                                <div class="flex justify-center">
                                    <p class="text-[18px]">Rp 12.999.000  <span class="text-red-500 text-[15px]">20 %</span></p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-3">
                                <div class="flex justify-center">
                                    {{-- <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button> --}}

                                    <a href="#" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Beli Sekarang
                                    </a>
                                </div>
                             </div>
                        </div>
                        <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
                            <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                                <div class="flex justify-center ">
                                    <img src="{{ Vite::asset('modules/shop/Resources/assets/images/checkout/applewacth3.png') }}" class="h-[200px]" alt="">
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mb-6">
                                <div class="flex justify-center">
                                    <p class="font-bold text-[18px]">Apple Wacth</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-1">
                                <div class="flex justify-center">
                                    <p class="text-[18px] text-slate-400 line-through">Rp 15.999.000</p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 ">
                                <div class="flex justify-center">
                                    <p class="text-[18px]">Rp 12.999.000  <span class="text-red-500 text-[15px]">20 %</span></p>
                                </div>
                             </div>
                             <div class="grid grid-cols-1 mt-3">
                                <div class="flex justify-center">
                                    {{-- <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli Sekarang</button> --}}

                                    <a href="#" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                        Beli Sekarang
                                    </a>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            
                <!-- Carousel Controls -->
                <button id="prev" type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-500 dark:bg-gray-800/30 group-hover:bg-blue-600 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-grey dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button id="next" type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-500 dark:bg-gray-800/30 group-hover:bg-blue-600  dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-grey dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            
        </div>
    </div>
    <div class="box"></div>
</div>
<hr>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const carousel = document.getElementById('carousel');
    const carousels = document.getElementById('carousel-items');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const windowWidth = window.innerWidth;
    const classes = carousels.classList;
    let currentIndex = 0;

    const moveToSlide = (index) => {
        // console.log(index);
        if (index < 0) {
            currentIndex = carouselItems.length - 1;
        } else if (index >= carouselItems.length) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        const offset = -currentIndex * (carouselItems[0].offsetWidth + 16); // 16px is padding
        carousel.style.transform = `translateX(${offset}px)`;
    };

    prevBtn.addEventListener('click', () => {
        
        
        if (windowWidth >= 1024) { 
            console.log('Kelas yang aktif untuk lebar besar:', classes.contains('lg:w-1/4') ? 'lg:w-1/4' : 'Tidak ada lg:w-1/4');
            let hasil = carouselItems.length - 4 ;
            if (currentIndex == 0 ){
                moveToSlide(currentIndex + hasil);
            } else{
                moveToSlide(currentIndex - 1);
            }
        } else if (windowWidth >= 768) { 
            console.log('Kelas yang aktif untuk lebar sedang:', classes.contains('md:w-1/3') ? 'md:w-1/3' : 'Tidak ada md:w-1/3');
            let hasil = carouselItems.length - 3 ;
            if (currentIndex == 0 ){
                moveToSlide(currentIndex + hasil);
            } else{
                moveToSlide(currentIndex - 1);
            }
        } else if (windowWidth >= 640) { 
            console.log('Kelas yang aktif untuk lebar kecil:', classes.contains('sm:w-1/2') ? 'sm:w-1/2' : 'Tidak ada sm:w-1/2');
            let hasil = carouselItems.length - 2 ;
            if (currentIndex == 0 ){
                moveToSlide(currentIndex + hasil);
            } else{
                moveToSlide(currentIndex - 1);
            }
        } else {
            console.log('Kelas yang aktif untuk lebar sangat kecil:', classes.contains('w-full') ? 'w-full' : 'Tidak ada w-full');
            let hasil = carouselItems.length - 1 ;
            if (currentIndex == 0 ){
                moveToSlide(currentIndex + hasil);
            } else{
                moveToSlide(currentIndex - 1);
            }
        }
    });

    nextBtn.addEventListener('click', () => {
        if (windowWidth >= 1024) { 
            console.log('Kelas yang aktif untuk lebar besar:', classes.contains('lg:w-1/4') ? 'lg:w-1/4' : 'Tidak ada lg:w-1/4');
            let hasil = carouselItems.length - 5 ;
            let hasil1 = carouselItems.length - 4 ;
            if (hasil >= currentIndex  ) {
                moveToSlide(currentIndex + 1);
            } else if (hasil1 == currentIndex){
                moveToSlide(currentIndex + 4);
            }
        } else if (windowWidth >= 768) { 
            console.log('Kelas yang aktif untuk lebar sedang:', classes.contains('md:w-1/3') ? 'md:w-1/3' : 'Tidak ada md:w-1/3');
            let hasil = carouselItems.length - 4 ;
            let hasil1 = carouselItems.length - 3 ;
            if (hasil >= currentIndex  ) {
                moveToSlide(currentIndex + 1);
            } else if (hasil1 == currentIndex){
                moveToSlide(currentIndex + 3);
            }
        } else if (windowWidth >= 640) { 
            console.log('Kelas yang aktif untuk lebar kecil:', classes.contains('sm:w-1/2') ? 'sm:w-1/2' : 'Tidak ada sm:w-1/2');
            let hasil = carouselItems.length - 3 ;
            let hasil1 = carouselItems.length - 2 ;
            if (hasil >= currentIndex  ) {
                moveToSlide(currentIndex + 1);
            } else if (hasil1 == currentIndex){
                moveToSlide(currentIndex + 2);
            }
        } else {
            console.log('Kelas yang aktif untuk lebar sangat kecil:', classes.contains('w-full') ? 'w-full' : 'Tidak ada w-full');
            let hasil = carouselItems.length - 2 ;
            let hasil1 = carouselItems.length - 1 ;
            if (hasil >= currentIndex  ) {
                moveToSlide(currentIndex + 1);
            } else if (hasil1 == currentIndex){
                moveToSlide(currentIndex + 1);
            }
        }
    });
});

</script>

@endsection
