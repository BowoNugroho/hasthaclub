@extends('shop::customer.dashboard')

@section('content_customer')
<div class="grid grid-cols-1">
    <div class="box">
        <div class="grid grid-cols-6">
            <div class="box col-span-2"></div>
            <div class="box col-span-2">
                <p class="text-2xl font-bold text-start mb-5 mt-5">Informasi Akun</p>
                <form action="{{ route('updateCs',$dt->id) }}" method="post">
                    @csrf
                    <div class="mb-10 mt-3">
                        @if(session('success'))
                        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50  role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#alert-3" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                            </button>
                        </div>
                        @endif
                        @if(session('error'))
                            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">
                                    {{ session('error') }}
                                </div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8  " data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                        {{-- <input type="hidden" name="id" value="{{ $dt->id }}"> --}}
                        <input type="text" id="name" name="name" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('name') is-invalid @enderror" placeholder="  " value="{{ $dt->name }}" >
                        <label for="name" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Nama</label>
                            @if ($errors->has('name'))
                                <span class="text-red-500">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                        <input type="text" id="no_hp" name="no_hp" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('no_hp') is-invalid @enderror" placeholder=" " value="{{ $dt->no_hp }}" >
                        <label for="no_hp" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">No. handphone</label>
                            @if ($errors->has('no_hp'))
                                <span class="text-red-500">{{ $errors->first('no_hp') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                        <input type="text" id="email" name="email" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('email') is-invalid @enderror" placeholder=" " value="{{ $dt->email }}" >
                        <label for="email" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Email</label>
                            @if ($errors->has('email'))
                                <span class="text-red-500">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                        <input type="text" id="ktp" name="ktp" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('ktp') is-invalid @enderror" placeholder=" " value="{{ $dt->username }}" >
                        <label for="ktp" 
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">KTP / SIM</label>
                            @if ($errors->has('ktp'))
                                <span class="text-red-500">{{ $errors->first('ktp') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-10 mt-3">
                        <div class="relative">
                                <div class="max-w-sm mx-auto">
                                    <label for="gender" 
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-full p-3.5  peer" placeholder=" ">
                                        <option value="">- pilih -</option>
                                        <option value="laki-laki" {{ $dt->gender == "laki-laki" ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="perempuan" {{ $dt->gender == "perempuan" ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="mb-10 text-center mt-10">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="box col-span-2"></div>
        </div>
    </div>
</div>
@endsection