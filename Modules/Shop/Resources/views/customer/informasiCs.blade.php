@extends('shop::customer.dashboard')

@section('content_customer')
<div class="grid grid-cols-1">
    <p class="text-2xl font-bold text-start mb-5 mt-5">Informasi Akun</p>
    <form action="{{ route('updateCs',$dt->id) }}" method="post">
        @csrf
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
            <input type="text" id="ktp" name="ktp" class="block  p-3.5 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none w-full  peer @error('ktp') is-invalid @enderror" placeholder=" " value="{{ $dt->ktp }}" >
            <label for="ktp" 
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">KTP / SIM</label>
                @if ($errors->has('ktp'))
                    <span class="text-red-500">{{ $errors->first('ktp') }}</span>
                @endif
            </div>
        </div>
        <div class="mb-10 mt-3">
            <div class="relative">
                <label for="gender" 
                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-3.5 scale-75 top-3.5 left-3 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:translate-y-[-0.8rem] peer-focus:scale-75 peer-focus:text-blue-600">Jenis Kelamin</label>
                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none w-full p-3.5  peer" placeholder=" ">
                    <option value="">- pilih -</option>
                    <option value="laki-laki" {{ $dt->gender == "laki-laki" ? 'selected' : '' }}>Laki - Laki</option>
                    <option value="perempuan" {{ $dt->gender == "perempuan" ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-10 text-center mt-10">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
        </div>
    </form>
</div>
@endsection