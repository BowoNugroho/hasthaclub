{{-- <div class="grid grid-cols-3 gap-4"> --}}

    @foreach($products as $product)
    <div class=" max-auto ">
         <div class="grid grid-cols-1 mb-2 mt-5 p-5 rounded-lg border border-black">
            <div class="flex justify-center ">
                <a href="{{ route('detail.katalog.product', $product->id) }}">
                    <img src="{{ url('public/storage/'. $product->product_variants_img1) }}" class="h-[200px] hover:scale-110" alt="">
                </a>
            </div>
         </div>
         <div class="grid grid-cols-1 ">
            <div class="flex justify-center">
                <p class="font-bold text-[18px]">{{ $product->product_name }}  </p>
            </div>
         </div>
         <div class="grid grid-cols-1 mb-6">
            <div class="flex justify-center">
                <p class="font-bold text-[18px]">{{ $product->capacity_name }} {{ $product->color_name }} </p>
            </div>
         </div>
         <div class="grid grid-cols-1 mt-1">
            <div class="flex justify-center">
                <p class="text-[18px] text-slate-400 line-through">Rp. {{ number_format($product->harga, 0, ',', '.')  }}</p>
            </div>
         </div>
         <div class="grid grid-cols-1 ">
            <div class="flex justify-center">
                <p class="text-[18px]">Rp. {{  number_format($product->harga_diskon, 0, ',', '.')  }}  <span class="text-red-500 text-[15px]">20 %</span></p>
            </div>
         </div>
         <div class="grid grid-cols-1 mt-3">
            <div class="flex justify-center">
                <a href="{{ route('detail.katalog.product', $product->id) }}" class="inline-block px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Beli Sekarang
                </a>
            </div>
        </div>
    </div>
    @endforeach
{{-- </div> --}}