@foreach ($data as $dt)
<div class="border max-auto p-5 rounded-lg shadow pl-8 mb-3">
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