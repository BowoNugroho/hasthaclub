@extends('shop::customer.dashboard')
@section('cart-count')
@if (@auth('customer')->user()->id)
<span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
    {{ $cartCount ?? 0 }}
</span>
@endif
@endsection
@section('content_customer')
@foreach($dtCo as $val)
<div class="flex mt-3 justify-between">
    <span class="text-lg"># {{$val->invoice}}</span>
    <span>Order Status :
    <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{$val->order_status}}</span></span>
</div>
<div class="grid">
    <span>Status Pembayaran : <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full"> {{ $val->status_pembayaran == 0 ? 'Belum' : 'Sudah' }}</span></span>
</div>
<div class="grid">
    <span>Total Pembayaran : Rp. {{ number_format($val->total_harga, 0, ',', '.')  }}</span>
</div>
<div class="text-lg grid mt-10 mb-5">
    <div class="flex justify-center">
        <a href="{{route('checkout.paymentRek',  ['co_id' => $val->id ])}}">
            <span class="inline-block px-2 py-2 border-2 bg-green-500 border-green-500 text-white font-semibold text-sm leading-tight rounded-full hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Konfirmasi Pembayaran</span>
        </a>
    </div>
</div>
<hr>
@endforeach
@endsection