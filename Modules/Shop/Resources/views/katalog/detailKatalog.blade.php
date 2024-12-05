@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-2 p-10">
        <div class="flex justify-center ">
            <img src="{{ url('public/modules/shop/images/terbaru/iphone14.png') }}" class="h-[400px] " alt="">
        </div> 
        <div class="grid grid-cols-2 mt-10 gap-4">
            <div class="box  flex justify-center">
                <img src="{{ url('public/modules/shop/images/terbaru/iphone14.png') }}" class="h-[300px] " alt="">
            </div>
            <div class="box  flex justify-center">
                <img src="{{ url('public/modules/shop/images/terbaru/iphone14.png') }}" class="h-[300px] " alt="">
            </div>
        </div>
    </div>
    <div class="box p-10">
        <div class="grid grid-cols-1">
            <div class="box">
                <span class="text-3xl font-bold">iPhone 15 Plus</span>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="box">
                <span class="text-[12px] text-gray-600 ">SKU: 8100122760</span>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <span class="text-[16px] text-slate-500 line-through">Rp 15.999.000</span>
            </div>
        </div>
        <div class="grid grid-cols-1">
            <div class="box">
                <span class="text-xl font-bold ">Rp 12.999.000  <span class="text-red-500 text-[12px]">[20 %]</span></span>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <span class="text-[15px] font-bold">Warna</span>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-3">
            <div class="box flex">
                <button type="button" class="border focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500 hover:scale-105 font-medium rounded-full text-[11px] px-3 py-1 text-center me-2 mb-2 ">Blue</button>
                <button type="button" class="border focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500 hover:scale-105 font-medium rounded-full text-[11px] px-3 py-1 text-center me-2 mb-2 ">Red</button>
                <button type="button" class="border focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500 hover:scale-105 font-medium rounded-full text-[11px] px-3 py-1 text-center me-2 mb-2 ">White</button>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <span class="text-[15px] font-bold">Kapasitas</span>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-3">
            <div class="box">
                <button type="button" class="border w-full focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500  font-medium rounded-md text-[15px] px-3 py-2.5 text-start me-2 mb-2 ">128 GB</button>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-3">
            <div class="box">
                <button type="button" class="border w-full focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500  font-medium rounded-md text-[15px] px-3 py-2.5 text-start me-2 mb-2 ">256 GB</button>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-3">
            <div class="box">
                <button type="button" class="border w-full focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500  font-medium rounded-md text-[15px] px-3 py-2.5 text-start me-2 mb-2 ">512 GB</button>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <span class="text-[15px] font-bold">Jumlah</span>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <div class="flex items-center gap-4 w-[160px]  p-1.5 rounded-lg outline outline-1">
                    <button id="decrease" class="text-lg text-gray-700 rounded-full w-10 h-8 flex justify-center items-center font-bold">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <input type="number" id="jumlah" class="w-full text-center text-lg p-1" value="1" min="1">
                    <button id="increase" class="text-lg text-gray-700 rounded-full w-10 h-8 flex justify-center items-center font-bold">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <span class="text-[15px] font-bold">Ambil di toko</span>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-2 ml-5">
            <div class="box">
                <a href="">
                    <span class="text-[15px] font-bold text-blue-500">Pilih Toko <i class="fa-solid fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box">
                <button type="submit" class="text-lg text-white bg-blue-500 rounded-lg w-full px-3 py-1  flex justify-center items-center ">
                    Tambah Keranjang
                </button>
            </div>
        </div>
    </div>
    <div class="box "></div>
</div>
<div class="grid grid-cols-5 mb-7">
    <div class="box"></div>
    <div class="box col-span-3">
        <div>
            <hr>
            <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:underline" aria-controls="dropdown-promo" data-collapse-toggle="dropdown-promo">
                <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap text-blue-500  hover:underline">Ringkasan</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                 </svg>
            </button>
            <div id="dropdown-promo">
                <div class="grid grid-cols-3 p-6">
                    <div class="box">
                        <span>Deskripsi</span>
                    </div>
                    <div class="box col-span-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aperiam distinctio sunt totam itaque, natus iure similique a et neque, vero aspernatur enim possimus, minus placeat. Id voluptates nesciunt distinctio.</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 p-6">
                    <div class="box">
                        <span>Fitur</span>
                    </div>
                    <div class="box col-span-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aperiam distinctio sunt totam itaque, natus iure similique a et neque, vero aspernatur enim possimus, minus placeat. Id voluptates nesciunt distinctio.</p>
                    </div>
                </div>
                
            </div>
            {{-- <hr> --}}
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection

@section('script')

<script>
    // Mengambil elemen-elemen
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const jumlahInput = document.getElementById('jumlah');

    // Menambahkan event listener untuk tombol -
    decreaseButton.addEventListener('click', function() {
        let currentValue = parseInt(jumlahInput.value);
        if (currentValue > 1) {
            jumlahInput.value = currentValue - 1;
        }
    });

    // Menambahkan event listener untuk tombol +
    increaseButton.addEventListener('click', function() {
        let currentValue = parseInt(jumlahInput.value);
        jumlahInput.value = currentValue + 1;
    });
</script>
    
@endsection