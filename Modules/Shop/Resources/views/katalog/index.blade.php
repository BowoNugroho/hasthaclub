@extends('shop::layouts.app')

@section('title')
    Katalog 
@endsection

@section('cart-count')
    @if (@auth('customer')->user()->id)
        <span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>                                                     
    @endif
@endsection
@section('cart-count2')
    @if (@auth('customer')->user()->id)
        <span id="cart-count2" class="cart-count bg-blue-500  text-white w-4 h-4   text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection

@section('content')
<div class="grid grid-cols-1 mt-7">
    <div class="box text-center">
        <span class="2xl:text-3xl xl:text-3xl lg:text-3xl md:text-2xl sm:text-2xl font-bold tracking-widest">Hasil Pencarian</span>
    </div>
</div>
<div class="grid 2xl:grid-cols-5 xl:grid-cols-6 lg:grid-cols-7 mb-10 mt-8">
    <div class="box "></div>
    <div class="box 2xl:col-span-1 xl:col-span-1 col-span-1 hidden lg:flex">
        <div>
            {{-- <hr>
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
            </ul> --}}
            <hr>
            <button type="button" class="flex items-center w-full p-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:underline" aria-controls="dropdown-warna" data-collapse-toggle="dropdown-warna">
                <span class="flex-1 ms-3 text-start text-lg font-bold rtl:text-right whitespace-nowrap">Warna</span>
            </button>
            <form id="searchColorForm">
                <ul id="dropdown-warna" class=" py-2 space-y-2">
                    @foreach ($color as $val )
                        <li>
                            <div class="flex items-center mb-4 pl-11">
                                <input  type="checkbox" id="search_color-{{ $val->id }}" name="search_color[]" value="{{ $val->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                                <label for="search_color-{{ $val->id }}" class="ms-2  font-medium text-gray-900 ">{{ $val->color_name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>
    <div class="lg:hidden grid pl-5 justify-start">
        <button class="text-white bg-blue-500 rounded-lg w-full px-3 py-1 justify-center items-center 2xl:text-sm xl:text-sm lg:text-sm md:text-[12px] text-[12px] " aria-controls="dropdown-warna2" data-collapse-toggle="dropdown-warna2"> <i class="fa-solid fa-filter"></i>&nbsp;&nbsp; filter Warna</button>
        <form id="searchColorForm">
            <ul id="dropdown-warna2" class="hidden py-2 space-y-2">
                @foreach ($color as $val )
                    <li>
                        <div class="flex items-center mb-4 pl-11">
                            <input  type="checkbox" id="search_color-{{ $val->id }}" name="search_color[]" value="{{ $val->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-lg ">
                            <label for="search_color-{{ $val->id }}" class="ms-2  font-medium text-gray-900 2xl:text-sm xl:text-sm lg:text-sm md:text-[12px] text-[12px]  ">{{ $val->color_name }}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
    <div class="box 2xl:col-span-2 xl:col-span-3 lg:col-span-4 p-3">
        <div class="grid grid-cols-1">
            <div class="flex justify-between">
                {{-- <span class="text-gray-500 ">{{ $productCount }} Produk</span> --}}
                {{-- <div class="max-w-sm ">
                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-[200px] p-2.5  peer" placeholder=" ">
                        <option value="">- Paling sesuai -</option>
                        <option value="laki-laki">Harga Tertinggi</option>
                        <option value="perempuan" >Harga Terendah</option>
                    </select>
                </div> --}}
            </div>
        </div>
        <div  id="product-list" class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 grid-cols-2  gap-4">
            @foreach($products as $product)
            <div class=" max-auto ">
                 <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
                    <div class="flex justify-center ">
                        <a href="{{ route('detail.katalog.product', $product->id) }}">
                            <img src="{{ url('storage/'. $product->product_img) }}" class="2xl:h-[200px]  xl:h-[200px] lg:h-[200px] h-[150px] hover:scale-110" alt="">
                        </a>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 ">
                    <div class="flex justify-center">
                        <p class="font-bold 2xl:text-[18px] xl:text-[18px] lg:text-[18px] md:text-[15px] text-[15px]">{{ $product->product_name }}  </p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mb-6">
                    <div class="flex justify-center">
                        <p class="font-bold 2xl:text-[18px] xl:text-[18px] lg:text-[18px] md:text-[15px] text-[15px]">{{ $product->capacity_name }} {{ $product->color_name }} </p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-1">
                    <div class="flex justify-center">
                        <p class="2xl:text-[18px] xl:text-[18px] lg:text-[18px] md:text-[15px] text-[15px] text-slate-400 line-through">Rp. {{ number_format($product->harga, 0, ',', '.')  }}</p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 ">
                    <div class="flex justify-center">
                        <p class="2xl:text-[18px] xl:text-[18px] lg:text-[18px] md:text-[15px] text-[15px]">Rp. {{  number_format($product->harga_diskon, 0, ',', '.')  }}  <span class="text-red-500 text-[15px]">20 %</span></p>
                    </div>
                 </div>
                 <div class="grid grid-cols-1 mt-3">
                    <div class="flex justify-center">
                        <a href="{{ route('detail.katalog.product', $product->id) }}" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold 2xl:text-sm xl:text-sm lg:text-sm md:text-[12px] text-[12px] leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- @if ($products->hasMorePages())
            <div class="text-center mt-4">
                <button id="load-more-product" class= "px-4 py-2 rounded text-blue-700">Tampilkan Lebih Banyak <i class="fa-solid fa-chevron-down"></i></button>
            </div>        
        @endif --}}
    </div>
    <div class="box"></div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
    let page = 2; // Halaman awal setelah halaman pertama

    let urlParams = new URLSearchParams(window.location.search);
    let searchProduct = urlParams.get('search_product');

    //

    $('input[name="search_color[]"]').on('change', function () {
        var selectedColors = [];
        console.log();

        // Collect selected color IDs
        $('input[name="search_color[]"]:checked').each(function () {
            selectedColors.push($(this).val());
        });

        // Perform AJAX request
        $.ajax({
            url: '{{ route('katalog') }}',  // The route to search for products
            method: 'GET',
            data: {
                colors: selectedColors,  // Send the selected color IDs
            },
            success: function (data) {
                $('#product-list').html(data.products_html);
            },
            error: function () {
                alert('Error occurred while fetching products.');
            }
        });
    });

});
</script>
@endsection