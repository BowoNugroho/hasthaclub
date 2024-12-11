@extends('shop::layouts.app')
@section('cart-count')
@if (@auth('customer')->user()->id)
<span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
    {{ $cartCount ?? 0 }}
</span>
@endif
@endsection
@section('content')
<div class="grid grid-cols-1 mt-10">
    <div class="box ">
        <p class="text-4xl font-bold text-center mb-10">Masuk</p>
        <div class="grid xl:grid-cols-8 lg:grid-cols-6 md:grid-cols-4 grid-cols-1 ">
            <div class="box xl:col-span-3 lg:col-span-2"></div>
            <div class="box lg:col-span-2 md:col-span-2 p-5"> 
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    @if ($errors->has('message'))
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 " role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div> {{ $errors->first('message') }}</div>
                        </div>
                    @endif
                    <div class="mb-10 mt-3">
                        <div class="relative">
                            <input type="text" id="no_hp" name="no_hp" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('no_hp') is-invalid @enderror" placeholder=" " value="{{ old('no_hp') }}" >
                            <label for="no_hp" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">No. handphone</label>
                            @if ($errors->has('no_hp'))
                            <span class="text-red-500">{{ $errors->first('no_hp') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 mt-10">
                        <div class="relative">
                            <input type="password" id="password" name="password" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer  @error('password') is-invalid @enderror" placeholder=" " > 
                            <label for="password" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Password</label>
                                <button type="button" onclick="showPasswordCs()"  class="absolute end-2.5 top-2 font-medium rounded-lg text-sm px-4 py-2"><i class="fa-regular fa-eye text-gray-500"></i></button>
                            @if ($errors->has('password'))
                                <span class="text-red-500">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 flex justify-between">
                        <a href="{{ route('registerCs') }}">Belum punya akun? <span class="text-blue-600 hover:underline hover:text-blue-400">Daftar </span></a>
                        {{-- <a href=""><span class="text-blue-600 hover:underline hover:text-blue-400">Lupa password?</span></a> --}}
                    </div>
                    <div class="mb-10 text-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm lg:w-[110px] w-[90px] sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
            <div class="box xl:col-span-3 lg:col-span-2"></div>
        </div>
    </div>

</div>
@endsection

@section('script')
    <script type="text/javascript">
        function showPasswordCs() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection