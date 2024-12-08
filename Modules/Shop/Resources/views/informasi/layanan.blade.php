@extends('shop::layouts.app')

@section('content')
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-3 p-10">
        <span class="text-3xl font-bold">LAYANAN PELANGGAN</span>
        <div class="grid mt-5">
            <ul>
                <li class="font-bold">The Hastha Club’s customer care :</li>
                <li>Email: <span class="text-blue-500">customercare@hasthaclub.com</span></li>
                <li>Whatsapp: <span class="text-blue-500">0882 0089 97382</span></li>
                <li>Instagram: <span class="text-blue-500">HasthaClub</span></li>
            </ul>
        </div>
        <div class="grid mt-5">
            <p>Butuh informasi lebih lanjut? Jangan ragu untuk menghubungi kami!</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection