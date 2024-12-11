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
        <p class="text-4xl font-bold text-center mb-10">Daftar Akun</p>
        <div class="grid xl:grid-cols-8 lg:grid-cols-6 md:grid-cols-4 grid-cols-1">
            <div class="box xl:col-span-3 lg:col-span-2"></div>
            <div class="box lg:col-span-2 md:col-span-2 p-5">
                <form action="{{ route('createCs') }}" method="post">
                    @csrf
                    <div class="mb-10 mt-3">
                        <div class="relative">
                            <input type="text" id="name" name="name" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer  @error('name') is-invalid @enderror" placeholder=" " value="{{ old('name') }}" >
                            <label for="name" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Nama</label>
                            @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                        <input type="text" id="no_hp" name="no_hp" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer  @error('no_hp') is-invalid @enderror" placeholder=" " value="{{ old('no_hp') }}" >
                        <label for="no_hp" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">No. handphone</label>
                            @if ($errors->has('no_hp'))
                                <span class="text-red-500">{{ $errors->first('no_hp') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                        <input type="text" id="email" name="email" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('email') is-invalid @enderror" placeholder=" " value="{{ old('email') }}" >
                        <label for="email" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Email</label>
                            @if ($errors->has('email'))
                                <span class="text-red-500">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 mt-10">
                        <div class="relative">
                            <input type="password" id="password" name="password" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('password') is-invalid @enderror" placeholder=" " > 
                            <label for="password" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Password</label>
                                <button type="button" onclick="showPasswordRg()"  class="absolute end-2.5 top-2 font-medium rounded-lg text-sm px-4 py-2"><i class="fa-regular fa-eye text-gray-500"></i></button>
                            @if ($errors->has('password'))
                                <span class="text-red-500">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 mt-10">
                        <div class="relative">
                            <input type="password" id="konfirm_password" name="konfirm_password" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('konfirm_password') is-invalid @enderror" placeholder=" " > 
                            <label for="konfirm_password" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Konfirmasi password</label>
                                <button type="button" onclick="showKonfirmPasswordRg()"  class="absolute end-2.5 top-2 font-medium rounded-lg text-sm px-4 py-2"><i class="fa-regular fa-eye text-gray-500"></i></button>
                            @if ($errors->has('konfirm_password'))
                                <span class="text-red-500">{{ $errors->first('konfirm_password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                        <input id="remember" name="status" type="checkbox" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 @error('status') is-invalid @enderror"  />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-700 ">Dengan mendaftar, kamu setuju dengan  <a href="#" class="text-blue-600 underline">Syarat, Ketentuan dan Privasi kami</a>.</label>
                    </div>
                    @if ($errors->has('status'))
                            <span class="text-red-500">{{ $errors->first('status') }}</span>
                    @endif
                    <div class="mb-10 text-center mt-10">
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
        function showPasswordRg() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function showKonfirmPasswordRg() {
            var x = document.getElementById("konfirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection