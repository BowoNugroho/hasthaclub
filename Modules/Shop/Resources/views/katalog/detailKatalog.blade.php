@extends('shop::layouts.app')

@section('title')
    Detail Katalog
@endsection

@section('cart-count')
@if (@auth('customer')->user()->id)
<span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
    {{ $cartCount ?? 0 }}
</span>
@endif
@endsection<!-- Dynamic cart count passed from the controller -->
@section('content')
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-2 p-10">
        <div class="flex justify-center ">
            <img src="{{ url('public/storage/'. $product->product_img) }}" class="h-[400px] " alt="">
        </div> 
        <div class="grid grid-cols-2 mt-10 gap-4">
            <div class="box  flex justify-center">
                <img src="{{ url('public/storage/'. $product->product_img) }}" class="h-[300px] " alt="">
            </div>
            <div class="box  flex justify-center">
                <img src="{{ url('public/storage/'. $product->product_img) }}" class="h-[300px] " alt="">
            </div>
        </div>
    </div>
    <div class="box p-10">
        {{-- <form id="cartForm"> --}}
            {{-- @csrf --}}
            <div class="grid grid-cols-1">
                <div class="box">
                    <span class="text-3xl font-bold">{{ $product->product_name }}</span>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="box">
                    <span class="text-[12px] text-gray-600 ">SKU: 8100122760</span>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <div class="box">
                    <span class="text-[16px] text-slate-500 line-through">Rp.{{ number_format($product->harga, 0, ',', '.')  }}</span>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="box">
                    <span class="text-xl font-bold ">Rp.{{ number_format($product->harga_diskon, 0, ',', '.')  }}  <span class="text-red-500 text-[12px]">[20 %]</span></span>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <div class="box">
                    <span class="text-[15px] font-bold">Warna</span>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-3">
                <div class="box flex">
                    @foreach ($productWarna as $val )
                        @if ($val->color_id == $product->color_id)
                            <button type="button" data-color-id="{{ $val->color_id }}" onclick="variant(this)" class="border border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500 hover:scale-105 font-medium rounded-full text-[11px] px-3 py-1 text-center me-2 mb-2 ">{{ $val->color_name }}</button>
                        @else
                            <button type="button" data-color-id="{{ $val->color_id }}" onclick="variant(this)" class="border focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500 hover:scale-105 font-medium rounded-full text-[11px] px-3 py-1 text-center me-2 mb-2 ">{{ $val->color_name }}</button>
                        @endif
                    @endforeach
                    <select class="form-select hidden" id="select_color_id" name="select_color_id">
                        @foreach ($productWarna as $val )
                        <option value="{{ $val->color_id }}" {{ $val->color_id == $product->color_id ? 'selected' : '' }} >{{ $val->color_name }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <div class="box">
                    <span class="text-[15px] font-bold">Kapasitas</span>
                </div>
            </div>
            @foreach ($productKapasitas as $val)
                <div class="grid grid-cols-1 mt-3">
                    <div class="box">
                        @if ($val->capacity_id == $product->capacity_id)
                        <button type="button" data-capacity-id="{{ $val->capacity_id }}" onclick="variant(this)" class="border  border-blue-500 w-full focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500  font-medium rounded-md text-[15px] px-3 py-2.5 text-start me-2 mb-2 ">{{ $val->capacity_name }}</button>
                        @else
                        <button type="button" data-capacity-id="{{ $val->capacity_id }}"  onclick="variant(this)" class="border  w-full focus:outline-none focus:ring-4 focus:ring-blue-300 hover:ring-1 hover:ring-blue-500  font-medium rounded-md text-[15px] px-3 py-2.5 text-start me-2 mb-2 ">{{ $val->capacity_name }}</button>
                        @endif
                    </div>
                </div>
            @endforeach
            <select class="form-select hidden" id="select_capacity_id" name="select_capacity_id">
                @foreach ($productKapasitas as $val )
                <option value="{{ $val->capacity_id }}" {{ $val->capacity_id == $product->capacity_id ? 'selected' : '' }} >{{ $val->capacity_name }}</option>
                @endforeach 
            </select>
            <input type="hidden" id="product_id" value="{{ $product->product_id }}">
            <input type="hidden" id="product_variant_id" value="{{ $product->id }}">
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
                        <input type="number" id="qty" class="w-full text-center text-lg p-1" value="1" min="1">
                        <button id="increase" class="text-lg text-gray-700 rounded-full w-10 h-8 flex justify-center items-center font-bold">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            {{-- <div class="grid grid-cols-1 mt-5">
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
            </div> --}}
            <div class="grid grid-cols-1 mt-5">
                <div class="box">
                    <span class="text-[15px] font-bold">Voucher toko</span>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-2 ml-5">
                <div class="box">
                    <input type="text" name="voucher" id="voucher" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full p-3">
                    <span class="error text-red-500" id="voucher_error"></span>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-5">
                <div class="box">
                    <button type="button" onclick="submitCart(this)" class="text-lg text-white bg-blue-500 rounded-lg w-full px-3 py-1  flex justify-center items-center ">
                        <span id="buttonText">Tambah Keranjang</span>
                        <div role="status" id="loadingSpinner" style="display: none;">
                            <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        {{-- <span id="loadingSpinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span> --}}
                    </button>
                </div>
            </div>
        {{-- </form> --}}
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
                        <p>{{ $product->deskripsi }}</p>
                    </div>
                </div>
                {{-- <div class="grid grid-cols-3 p-6">
                    <div class="box">
                        <span>Fitur</span>
                    </div>
                    <div class="box col-span-2">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aperiam distinctio sunt totam itaque, natus iure similique a et neque, vero aspernatur enim possimus, minus placeat. Id voluptates nesciunt distinctio.</p>
                    </div>
                </div> --}}
                
            </div>
            {{-- <hr> --}}
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection


@section('script')
@include('shop::katalog.js')

<script>
    // Mengambil elemen-elemen
    const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.getElementById('increase');
    const jumlahInput = document.getElementById('qty');

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