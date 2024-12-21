@extends('shop::layouts.app')

@section('title')
    Karir
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
<div class="grid xl:grid-cols-5 lg:grid-cols-7 grid-cols-5">
    <div class="box"></div>
    <div class="box xl:col-span-3 lg:col-span-5 col-span-5 p-10">
        <span class="xl:text-3xl lg:text-3xl md:text-2xl text-2xl font-bold">HASTHA DIGITAL</span>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Adalah layanan yang akan membantu mengembangkan akun sosial media ( instagram)
                bisnismu agar di kenal oleh masyarakat luas sehingga dapat meningkatkan citra bisnis /
                produk yang kamu miliki dan meningkatkan jumlah pengunjung serta penjualan dari
                bisnismu.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Apa saja yang akan kamu dapatkan dari layanan Hastha Digital?</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td>1. Publikasi media / peliputan bisnismu untuk ditayangkan pada artikel media nasional (1x)</td>
                    </tr>
                    <tr>
                        <td>2. Free 1000 followers instagram</td>
                    </tr>
                    <tr>
                        <td>3. Free 100 likes untuk setiap postingan instagram selama 3 bulan (otomatis)</td>
                    </tr>
                    <tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Biaya layanan Hastha Digital</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td>1. Biaya 2 bulan pertama termasuk instalasi tools auto likes Rp 100.000</td>
                    </tr>
                    <tr>
                        <td>2. Biaya berlangganan bulan berikutnya Rp 20.000</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Lama proses instalasi</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td>1. Instalasi akun sosial media akan kami kerjakan sesuai dengan nomor urut pendaftaran. Umumnya proses instalasi selesai dalam maksimal 1 jam (tanpa kendala)</td>
                    </tr>
                    <tr>
                        <td>2. Proses publikasi / peliputan bisnis mitra akan kami proses maksimal dalam3 hari kerja.</td>
                    </tr>
                    <tr>
                        <td>3. Pengiriman followers akan kami kirim maksimal dalam 1x24jam (tanpa kendala)
                            terhitung sejak waktu pendaftaran dilakukan</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Apa yang perlu disiapkan sebelum menggunakan layanan?</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td>1. Username instagram dan link profil instagram</td>
                    </tr>
                    <tr>
                        <td>2. Akun instagram tidak boleh di private</td>
                    </tr>
                    <tr>
                        <td>3. Foto bisnis / usaha / produk untuk di tayangkan pada artikel media nasional</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Butuh informasi lebih lanjut? Atau ingin melakukan pemesanan? Silahkan hubungi kami
                melalui email berikut <span class="text-blue-500">cs@hasthaclub.com</span></p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection