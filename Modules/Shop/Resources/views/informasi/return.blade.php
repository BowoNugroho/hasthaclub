@extends('shop::layouts.app')

@section('title')
    Pengembalian & Penukaran
@endsection

@section('cart-count')
    @if (@auth('customer')->user()->id)
        <span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>                                                     
    @endif
@endsection
@section('cart-count2')
    @if (@auth('customer')->user()->id)
        <span id="cart-count2" class="cart-count bg-blue-500  text-white w-4 h-4   text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection

@section('content')
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-3 p-10">
        <span class="text-3xl font-bold">PENGEMBALIAN & PENUKARAN</span>
        <div class="grid mt-10">
            <p>Pusat Layanan Pelanggan Hastha Club untuk Pengembalian Barang</p>
            <p class="mt-2"> KOLEKTIF</p>
            <p class="mt-2"> Jl. Watu Gede No.58 Sarriharjo, Ngaglik, Sleman, Daerah Istimewa Yogyakarta 55581</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold ">Bagaimana kebijakan penukaran barang Hastha Club?</span>
            <p class="mt-2">Barang yang ditukar harus sesuai dengan kebijakan kami:</p>
            <p>- Barang harus dikembalikan dalam keadaan tidak dipakai, tidak rusak, dan tidak digunakan, dengan semua
                label masih terpasang dan kemasan asli disertakan.</p>
            <p class="mt-2">Barang yang tidak dapat ditukar & dikembalikan meliputi:</p>
            <p>- Barang obral akhir dan barang lain sebagaimana tercantum di halaman produk.</p>
            <p class="mt-2">Penukaran berlaku untuk pesanan yang dikirim ke Indonesia dan negara lain dalam waktu 4 (empat) hingga
                10 (sepuluh) hari kerja sejak tanggal pengiriman barang atau yang tercantum di Halaman Produk. Setiap
                penukaran atau penggantian untuk pesanan Internasional mungkin dikenakan biaya pengiriman tambahan,
                tergantung pada lokasi pengiriman.</p>
            <p class="mt-2">Jika barang ditemukan rusak atau cacat saat diterima, harap beri tahu kami dalam waktu 2 hari dan barang
                dapat diganti tanpa biaya dan biaya pengiriman akan dikembalikan sepenuhnya.</p>
            <p class="mt-2">Beberapa barang tidak dapat dikembalikan karena program penjualan, perjanjian khusus dengan pedagang,
                atau alasan sanitasi.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold ">Bagaimana cara menukar/mengembalikan barang yang saya beli?</span>
            <p class="mt-2">Metode A*:</p>
            <p class="mt-2">1. Kirim barang Anda kepada kami</p>
            <p>Tempelkan Label Pengiriman Pengembalian pada paket pengembalian Anda dan kirimkan ke kantor kami.</p>
            <p class="mt-2">Setelah kami menerima barang, kami akan melakukan pemeriksaan. Jika produk Anda lolos pemeriksaan
                pengembalian, Anda akan menerima WhatsApp konfirmasi. Kami akan menukar produk Anda sesuai
                dengan ketentuan dalam waktu minimal 14 hari kerja.</p>
            <p class="mt-2">Metode B:</p>
            <p class="mt-2">1. Hubungi Tim Layanan Pelanggan kami</p>
            <p>Tim Layanan Pelanggan kami akan dengan senang hati membantu Anda dalam penukaran.</p>
            <p class="mt-2">2. Kirim barang Anda kepada kami.</p>
            <p class="mt-2">*Metode yang Direkomendasikan</p>
            <p class="mt-2">Setelah kami menerima barang, kami akan melakukan pemeriksaan. Jika produk Anda lolos pemeriksaan
                pengembalian, Anda akan menerima email konfirmasi. Kami akan menukar produk Anda sesuai dengan
                ketentuan dalam waktu minimal 14 hari kerja.</p>
            <p class="mt-2">Anda memiliki waktu 4 hari kerja untuk mengirimkan produk Anda kepada kami. Untuk produk dengan nilai
                lebih dari Rp1.000.000, silakan kembalikan menggunakan pengiriman ekspres dan asuransi kurir.</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection