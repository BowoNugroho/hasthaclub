@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-5 p-5">
    <div class="box"></div>
    <div class="box col-span-3 text-center">
        <div class="grid grid-cols-1">
            <div class="box flex">
                <span class="text-4xl font-bold tracking-widest mr-24">Toko</span>
                <input type="text" placeholder="Cari Toko" class="w-[500px] pl-5 pr-3 py-1 text-gray-700  rounded-full focus:ring-2 focus:ring-blue-500 focus:outline-none  border border-gray-300 bg-gray-50" />
            </div>
        </div>
        <div class="grid grid-cols-1 mt-5 ml-5">
            <div class="flex justify-between">
                <span class="text-gray-500 ">{{ $count }} toko terdekat</span>
                {{-- <div class="max-w-sm ">
                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-[200px] p-2.5  peer" placeholder=" ">
                        <option value="">- Paling sesuai -</option>
                        <option value="laki-laki">Harga Tertinggi</option>
                        <option value="perempuan" >Harga Terendah</option>
                    </select>
                </div> --}}
            </div>
        </div>
        <div class="grid grid-cols-1 mt-2">
            <div class="box">
                @if ($data == null)
                <div class="border max-auto p-5 border-red-500 rounded-lg shadow pl-8 mb-3">
                    <div class="grid grid-cols-1">
                        <div class="grid grid-cols-1">
                            <div class="flex justify-center">
                                <span class="text-2xl font-bold text-red-500"> <i class="fa-solid fa-xmark"></i></span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div class="flex justify-center">
                                <span class="text-2xl font-bold text-red-500"> Belum Ada Store</span>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    @foreach ($data as $dt)
                    @if (auth('customer')->check())    
                        @if(auth('customer')->user()->store_id == $dt->id)                        
                            <div class="border border-green-400 max-auto p-5 rounded-lg shadow pl-8 mb-3">
                        @else
                            <div class="border max-auto p-5 rounded-lg shadow pl-8 mb-3">
                        @endif
                    @else
                        <div class="border max-auto p-5 rounded-lg shadow pl-8 mb-3">
                    @endif
                            <div class="grid grid-cols-3">
                                <div class="box col-span-2 ">
                                    <form action="{{ route('store.updateStore',$dt->id) }}" method="post">
                                        @csrf
                                        <div class="grid grid-cols-1">
                                            <div class="flex text-start ">
                                                <span class="text-2xl font-bold">{{ $dt->store_name }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <div class="flex text-start">
                                                <p class="font-bold text-md text-gray-500">{{ $dt->kota }}, {{ $dt->provinsi }}</p>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 mt-1">
                                            <div class="flex text-start">
                                                <p class="text-md font-bold">Alamat : <span class="text-blue-500 hover:underline">{{ $dt->alamat }}</span></p>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1">
                                            <div class="flex text-start">
                                                <p class="text-sm">Jam Operasinal : {{ $dt->jam_operasional }}</p>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 mt-5">
                                            <div class="box">
                                            @if (auth('customer')->check())    
                                                @if(auth('customer')->user()->store_id == $dt->id)
                                                <span class="text-lg text-white bg-green-500 rounded-xl w-[200px] px-3 py-1  flex justify-center items-center ">
                                                    Toko Saya
                                                </span>
                                                @else
                                                <button type="submit" class="text-lg text-white bg-blue-500 rounded-xl w-[200px] px-3 py-1  flex justify-center items-center ">
                                                    Pilih Toko Saya
                                                </button>
                                                @endif
                                            @else
                                                <button type="submit" class="text-lg text-white bg-blue-500 rounded-xl w-[200px] px-3 py-1  flex justify-center items-center ">
                                                    Pilih Toko Saya
                                                </button>
                                            @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="box ">
                                    <div class="grid grid-cols-1 p-2">
                                        <div class="flex justify-center ">
                                            <img src="{{ url('public/modules/shop/images/store.png') }}" class="h-[120px]" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection