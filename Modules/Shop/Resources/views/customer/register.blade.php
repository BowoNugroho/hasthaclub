@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-1 mt-10">
    <div class="box ">
        <p class="text-4xl font-bold text-center mb-10">Daftar Akun</p>
        <div class="grid grid-cols-5">
            <div class="box col-span-2"></div>
            <div class="box">
                <form action="{{ route('createCs') }}" method="post">
                    @csrf
                    <div class="mb-10 mt-3">
                        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" >
                            @if ($errors->has('name'))
                                <span class="text-red-500">{{ $errors->first('name') }}</span>
                            @endif
                    </div>
                    <div class="mb-10 mt-3">
                        <input type="text" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('no_hp') is-invalid @enderror" placeholder="No. handphone" value="{{ old('no_hp') }}" >
                            @if ($errors->has('no_hp'))
                                <span class="text-red-500">{{ $errors->first('no_hp') }}</span>
                            @endif
                    </div>
                    <div class="mb-10 mt-3">
                        <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" >
                            @if ($errors->has('email'))
                                <span class="text-red-500">{{ $errors->first('email') }}</span>
                            @endif
                    </div>
                    <div class="mb-3 mt-10">
                        <div class="relative">
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('password') is-invalid @enderror" placeholder="Password" > 
                                <button type="button" onclick="showPasswordRg()"  class="absolute end-2.5 top-2 font-medium rounded-lg text-sm px-4 py-2"><i class="fa-regular fa-eye text-gray-500"></i></button>
                            @if ($errors->has('password'))
                                <span class="text-red-500">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 mt-10">
                        <div class="relative">
                            <input type="password" id="konfirm_password" name="konfirm_password" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-blue-500 w-full p-3 @error('konfirm_password') is-invalid @enderror" placeholder="Konfirmasi password" > 
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