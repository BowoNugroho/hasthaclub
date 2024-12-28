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
            <p>Selain daripada mengembangkan akun sosial media instagram bisnismu, Hastha Digital jugaakan membantu untuk meliput bisnismu dan di muat dalam artikel media nasional. Sehinggadapat membantu pelanggan menemukan bisnismu melalui mesin pencarian Google danmeningkatkan citra bisnismu.</p>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Layanan Hastha Digital</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td class="font-bold">1. Layanan Instagram</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Instagram auto likes (postingan)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Instagram auto impression</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Instagram auto like + impression</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;d. Instagram auto reach + impression</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;e. Instagram auto view (reels)</td>
                    </tr>
                </table>
                <table class="mt-5">
                    <tr>
                        <td class="font-bold">2. Layanan Publikasi/Liputan Media Nasional</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Kabarbaru.co</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Radarbaru.com</td>
                    </tr>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Radarberita.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;d. Suaratime.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;e. Wartatime.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;f. Rakyatsipil.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;g. Dailynusantara.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;h. Portaldemokrasi.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;i. Haluannusantara.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;j. Nalarrakyat.com</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;k. Jogjapekan.com</td>
                    </tr>
                    <tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Paket dan Biaya Berlangganan Hastha Digital</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td class="font-bold">1. Paket Promo Rp 100.000</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Layanan instagram auto service selama 2 bulan (100-200 likes)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Layanan publikasi/liputan media nasional (1x)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Biaya langganan bulan berikutnya Rp 20.000</td>
                    </tr>
                </table>
                <table class="mt-5">
                    <tr>
                        <td class="font-bold">2. Paket Promo Rp 150.000</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Layanan instagram auto service selama 2 bulan (100-200 likes)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Layanan publikasi/liputan media nasional (2x)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Voucher belanja Hastha Club Rp 1.000.000</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;d. Biaya langganan bulan berikutnya Rp 20.000</td>
                    </tr>
                </table>
                <table class="mt-5">
                    <tr>
                        <td class="font-bold">3. Paket Promo Rp 200.000</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Layanan instagram auto service selama 2 bulan (100-200 likes)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Layanan publikasi/liputan media nasional (3x)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Voucher belanja Hastha Club Rp 1.000.000</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;d. Biaya langganan bulan berikutnya Rp 20.000</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Proses pengerjaan & Kebijakan</span>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td class="font-bold">1. Layanan Instagram Auto Service</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Proses instalasi hanya membutuhkan username akun</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Proses instalasi akan membutuhkan waktu 30 menit hingga 1 jam</td>
                    </tr>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Auto like postingan dapat digunakan untuk postingan sebelumnya dan postinganbaru</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;d. Jumlah like untuk setiap postingan sesuai kebijakan atau dapat dirubah sesuai
                            permintaan</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;e. Jumlah postingan tercover sebanyak 100 postingan setiap bulanya</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;f. Pengiriman like umumnya terkirim mulai 30 menit hingga 1 jam dari waktu postingdi lakukan</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;g. Like bisa dikirim sekaligus, bisa juga setiap 5,10,15,20 menit (bisa request)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;h. Seluruh layanan dilakukan secara organik, sehingga menjamin keamanan akuninstagram anda dari pelanggaran dll.</td>
                    </tr>
                </table>
                <table class="mt-5">
                    <tr>
                        <td class="font-bold">2. PLayanan Publikasi/Liputan Media Nasional</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;a. Silahkan pilih salah satu (sesuai paket) media yang ingin digunakan</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;b. Kirimkan foto bisnismu</td>
                    </tr>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;c. Kirimkan deskripsi artikel yang ingin di publish</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;d. Artikel bisnis akan di tayangkan urut sesuai dengan antrian pada media yang ingindigunakan</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;e. Umumnya proses publikasi membutuhkan waktu 3-7 hari kerja, namun waktutersebut dapat lebih lama sesuai dengan antrian pada media yang di pilih</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <span class="font-bold underline">Cara Pemesanan</span>
        </div>
        <div class="grid mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <p>Untuk melakukan pemesanaan, kamu bisa menghubungi salah satu kontak berikut:</p>
        </div>
        <div class="grid grid-cols-1 mt-5 xl:text-[17px] lg:text-[17px] text-[15px]">
            <div class="box ">
                <table>
                    <tr>
                        <td>WhatsApp &nbsp;&nbsp;&nbsp</td>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp 0882 0089 97382</td>
                    </tr>
                    <tr>
                        <td>Email &nbsp;&nbsp;&nbsp</td>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp; <span class="text-blue-500">cs@hasthaclub.com</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection