@extends('shop::layouts.app')
@section('cart-count')
    @if (@auth('customer')->user()->id)
        <span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection
@section('content')

<div class="grid xl:grid-cols-5 grid-cols-5 p-5">
    <div class="box "></div>
    <div class="box  xl:col-span-3 col-span-5 ">
        <form id="formCheckout">
            @csrf
        <div class="grid grid-cols-1 text-center">
            <span class="text-2xl font-bold tracking-widest">Form Checkout</span>
        </div>
        <div class="grid grid-cols-2">
            <div class="box">
                <p class="text-2xl font-bold text-start mb-5 mt-5">Data Penerima</p>
                <div class="mb-5 mt-3">
                    <div class="relative">
                        <label for="type_data" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Data Pemesanan</label>
                        <select id="type_data" name="type_data" onclick="selectData()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4 p-3  peer" placeholder=" ">
                            <option value="">- pilih -</option>
                            <option value="1" >Data sama dengan akun</option>
                            <option value="0" >Data berbeda dengan akun</option>
                        </select>
                    </div>
                </div>
                <div class="mb-5 mt-3">
                    <div class="relative">
                    <input type="text" id="customer_name" name="customer_name" class="block  p-3 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4  peer @error('customer_name') is-invalid @enderror" placeholder="  " value="" >
                    <input type="hidden" name="co_id" id="co_id" value="{{ $co_id }}">
                    <input type="hidden" name="role" id="role" value="{{ $role }}">
                    <label for="customer_name" 
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Nama</label>
                        <span class="error text-red-500" id="customer_name_error"></span>
                        
                    </div>
                </div>
                <div class="mb-5 mt-3">
                    <div class="relative">
                    <input type="text" id="customer_no_hp" name="customer_no_hp" class="block  p-3 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4  peer @error('customer_no_hp') is-invalid @enderror" placeholder="  " value="" >
                    <label for="customer_no_hp" 
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">No handphone</label>
                        <span class="error text-red-500" id="customer_no_hp_error"></span>
                        
                    </div>
                </div>
                <div class="mb-5 mt-3">
                    <div class="relative">
                    <input type="text" id="customer_email" name="customer_email" class="block  p-3 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4  peer @error('customer_email') is-invalid @enderror" placeholder="  " value="" >
                    <label for="customer_email" 
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Email</label>
                        
                    </div>
                </div>
                <div class="mb-5 mt-3">
                    <div class="relative">
                    <textarea name="customer_alamat" id="customer_alamat" name="customer_alamat" cols="30" rows="4" class="block  p-3 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4  peer @error('customer_alamat') is-invalid @enderror" placeholder="  "></textarea>
                    <label for="customer_alamat" 
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Alamat</label>
                        
                    </div>
                </div>
                
            </div>
            <div class="box">
                <p class="text-2xl font-bold text-white text-start mb-5 mt-5">Data Penerima</p>
                <div class="mb-5 mt-3">
                    <div class="relative">
                        <textarea name="catatan" id="catatan" name="catatan" cols="30" rows="4" class="block  p-3 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4  peer @error('catatan') is-invalid @enderror" placeholder="  "></textarea>
                        <label for="catatan" 
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Catatan</label>
                        
                    </div>
                </div>
                @if($role == 'sales_to')
                <div class="mb-5 mt-3">
                        <div class="relative grid">
                            <select id="type_pemesanan" name="type_pemesanan"  onclick="typePemesanan()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-3/4 p-3  peer" placeholder=" ">
                                <option value="">- pilih -</option>
                                <option value="Pick Up" >Ambil di Store</option>
                                <option value="Cod" >COD Sales TO</option>
                            </select>
                            <label for="type_pemesanan" 
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Type Pemesanan</label>
                            <span class="error text-red-500" id="type_pemesanan_error"></span>
                        </div>
                    </div>
                    <div class="mb-5 mt-3 hidden" id="pickUp">
                        <div class="grid grid-cols-1 mt-5">
                            <div class="box">
                                <span class="text-[15px] font-bold">Ambil di toko </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 mt-2 ml-5">
                            <div class="box">
                                @if ($cekStore1->store_id == null)
                                    <a href="{{ route('store') }}">
                                        <span class="text-[15px] font-bold text-blue-500">Pilih Toko <i class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                @else
                                    <a href="{{ route('store') }}">
                                        <span class="text-[15px] font-bold text-blue-500">{{ $cekStore1->store_name }} <i class="fa-solid fa-chevron-right"></i></span>
                                        <input type="hidden" id="store_id" name="store_id" value="{{ $cekStore1->store_id}}">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($role != 'sales_to')
                <div class="mb-5 mt-3">
                    <div class="grid grid-cols-1 mt-5">
                        <div class="box">
                            <span class="text-[15px] font-bold">Ambil di toko </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-2 ml-5">
                        <div class="box">
                            @if ($cekStore2->store_id == null)
                                @if ($cekStore1->store_id == null)
                                    <a href="{{ route('store') }}">
                                        <span class="text-[15px] font-bold text-blue-500">Pilih Toko <i class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                @else
                                    <a href="{{ route('store') }}">
                                        <span class="text-[15px] font-bold text-blue-500">{{ $cekStore1->store_name }} <i class="fa-solid fa-chevron-right"></i></span>
                                        <input type="hidden" id="store_id" name="store_id" value="{{ $cekStore1->store_id}}">
                                    </a>
                                @endif
                                
                            @else
                                {{-- <a href="{{ route('store') }}"> --}}
                                    <span class="text-[15px] font-bold text-blue-500">{{ $cekStore2->store_name }} <i class="fa-solid fa-chevron-right"></i></span>
                                    <input type="hidden" id="store_id" name="store_id" value="{{ $cekStore2->store_id}}">
                                {{-- </a> --}}
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <div class="mb-5 mt-3">
                    <div class="grid grid-cols-1 mt-5">
                        <span class="text-[15px] font-bold">Rincian Pesanan :</span>
                        <span class="text-[15px] ">Total Item : <span class="font-bold">{{ $totalItem }}</span> item</span>
                        <input type="hidden" id="total_harga" name="total_harga" value="{{ $totalHarga }}">
                        <span class="text-[15px] ">Total Pembayaran : <span class="font-bold text-blue-500">Rp.{{ number_format($totalHarga, 0, ',', '.')  }}</span></span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-1 mt-8">
            <div class="flex  justify-center">
                <button type="submit"  class="inline-block w-1/4 px-6 py-2.5 border-2 bg-blue-500 border-blue-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Bayar</button>
            </div>
        </div>
    </form>
    </div>
    <div class="box "></div>
</div>
@endsection
@include('shop::checkout.js')