@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-1 mt-10">
    <div class="box ">
        <p class="text-4xl font-bold text-center mb-10">Masuk</p>
        <div class="grid grid-cols-5">
            <div class="box col-span-2"></div>
            <div class="box"> 
                <form action="{{ route('loginCs') }}" method="post">
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
                        <input type="text" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('no_hp') is-invalid @enderror" placeholder=" no. handphone" value="{{ old('username') }}" >
                            @if ($errors->has('no_hp'))
                                <span class="text-red-500">{{ $errors->first('no_hp') }}</span>
                            @endif
                    </div>
                    <div class="mb-3 mt-10">
                        <div class="relative">
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('password') is-invalid @enderror" placeholder="password" > 
                                <button type="button" onclick="showPasswordCs()"  class="absolute end-2.5 top-2 font-medium rounded-lg text-sm px-4 py-2"><i class="fa-regular fa-eye text-gray-500"></i></button>
                            @if ($errors->has('password'))
                                <span class="text-red-500">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 flex justify-between">
                        <a href="">Belum punya akun? <span class="text-blue-600 hover:underline hover:text-blue-400">Daftar </span></a>
                        <a href=""><span class="text-blue-600 hover:underline hover:text-blue-400">Lupa password?</span></a>
                    </div>
                    <div class="mb-6 text-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
            <div class="box col-span-2"></div>
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