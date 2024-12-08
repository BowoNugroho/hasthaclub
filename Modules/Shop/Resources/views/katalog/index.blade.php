@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-1 mt-7">
    <div class="box text-center">
        <span class="text-3xl font-bold tracking-widest">Hasil Pencarian</span>
    </div>
</div>
<div class="grid  grid-cols-5 mb-10 mt-8">
    <div class="box  h-16"></div>
    <div class="box ">
        <div>
            <hr>
            <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:underline" aria-controls="dropdown-ketersediaan" data-collapse-toggle="dropdown-ketersediaan">
                    <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Ketersediaan</span>
            </button>
            <ul id="dropdown-ketersediaan" class="hidden py-2 space-y-2">
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">Tersedia</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">Tidak Tersedia</label>
                    </div>
                </li>
            </ul>
            <hr>
            <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:underline" aria-controls="dropdown-promo" data-collapse-toggle="dropdown-promo">
                <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Promo</span>
            </button>
            <ul id="dropdown-promo" class="hidden py-2 space-y-2">
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">Promo</label>
                    </div>
                </li>
            </ul>
            <hr>
            <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:underline" aria-controls="dropdown-warna" data-collapse-toggle="dropdown-warna">
                <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Warna</span>
            </button>
            <ul id="dropdown-warna" class="hidden py-2 space-y-2">
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">Midnight</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">Black</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">Blue</label>
                    </div>
                </li>
                <li>
                    <div class="flex items-center mb-4 pl-11">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                        <label for="default-checkbox" class="ms-2  font-medium text-gray-900 ">White</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="box  col-span-2 p-3">
        <div class="grid grid-cols-1">
            <div class="flex justify-between">
                <span class="text-gray-500 ">21 Produk</span>
                <div class="max-w-sm ">
                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-[200px] p-2.5  peer" placeholder=" ">
                        <option value="">- Paling sesuai -</option>
                        <option value="laki-laki">Harga Tertinggi</option>
                        <option value="perempuan" >Harga Terendah</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach($products as $product)
            <div class=" max-auto ">
                 <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                    <div class="flex justify-center ">
                        <img src="{{ url('public/modules/shop/images/terbaru/iphone14.png') }}" class="h-[200px] hover:scale-110" alt="">
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mb-6">
                    <div class="flex justify-center">
                        <p class="font-bold text-[18px]">{{ $product['name'] }}</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-center">
                        <p class="text-[18px] text-slate-400 line-through">Rp .{{ number_format($product['harga_normal'], 0, ',', '.')  }}</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 ">
                    <div class="flex justify-center">
                        <p class="text-[18px]">Rp  .{{  number_format($product['harga_promo'], 0, ',', '.')  }}  <span class="text-red-500 text-[15px]">20 %</span></p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-center">
                        <a href="{{ route('detail.katalog') }}" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-9">
            <button id="load-more" class= "px-4 py-2 rounded text-blue-700">Tampilkan Lebih Banyak <i class="fa-solid fa-chevron-down"></i></button>
        </div>
    </div>
    <div class="box  "></div>
</div>
@endsection