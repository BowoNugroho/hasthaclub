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
<div class="grid grid-cols-5">
    <div class="box"></div>
    <div class="box col-span-3 p-10">
        <span class="text-3xl font-bold">KARIR</span>
        <div class="grid mt-5">
            <p>Bergabung dan menjadi bagian dari perjalanan luar biasa Hastha Club</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Lowongan Kerja di Hastha Club :</span>
        </div>
        <div class="grid grid-cols-2 mt-5">
            <div class="box ">
                <table>
                    <tr>
                        <td>Posisi &nbsp;&nbsp;</td>
                        <td>: &nbsp;&nbsp;</td>
                        <td> Sales Promotor</td>
                    </tr>
                    <tr>
                        <td>Departemen &nbsp;&nbsp;</td>
                        <td>: &nbsp;&nbsp;</td>
                        <td> Marketing</td>
                    </tr>
                    <tr>
                        <td>Lokasi &nbsp;&nbsp;</td>
                        <td>: &nbsp;&nbsp;</td>
                        <td> Sesuai Kota Pilihan</td>
                    </tr>
                </table>
            </div>
            <div class="box"></div>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Deskripsi :</span>
        </div>
        <div class="grid mt-3">
            <p>Sales Promotor merupakan staff yang bertugas mempromosikan dan menjual
                produk atau layanan secara langsung kepada konsumen.</p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Peran sales promotor :</span>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box ">
                <table>
                    <tr>
                        <td>- Meningkatkan penjualan</td>
                    </tr>
                    <tr>
                        <td>- Membangun hubungan dengan pelanggan</td>
                    </tr>
                    <tr>
                        <td>- Mengumpulkan feedback konsumen</td>
                    </tr>
                    <tr>
                        <td>- Menjaga citra perusahaan</td>
                    </tr>
                    <tr>
                        <td>- Meningkatkan brand awareness</td>
                    </tr>
                    <tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Tugas dan tanggung jawab sales promotor :</span>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box ">
                <table>
                    <tr>
                        <td>- Memahami produk secara mendalam</td>
                    </tr>
                    <tr>
                        <td>- Meningkatkan penjualan</td>
                    </tr>
                    <tr>
                        <td>- Melaporkan penjualan dan aktivitas promosi</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Syarat* :</span>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box ">
                <table>
                    <tr>
                        <td>- Memiliki skill komunikasi yang baik</td>
                    </tr>
                    <tr>
                        <td>- Keterampilan persuasi</td>
                    </tr>
                    <tr>
                        <td>- Pengetahuan produk yang mendalam</td>
                    </tr>
                    <tr>
                        <td>- Pandai dalam menyelesaikan masalah</td>
                    </tr>
                    <tr>
                        <td>- Memiliki keterampilan negosiasi</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Penempatan :</span>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box ">
                <table>
                    <tr>
                        <td>- Staff sales promotor akan ditempatkan dikota sesuai pilihan</td>
                    </tr>
                    <tr>
                        <td>- Sales Promotor akan bekerja di lapangan, tidak ditempatkan pada storeHastha Club</td>
                    </tr>
                    <tr>
                        <td>- Sesuai</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">Benefit sales promotor :</span>
        </div>
        <div class="grid grid-cols-1 mt-5">
            <div class="box ">
                <table>
                    <tr>
                        <td>- Gaji pokok</td>
                    </tr>
                    <tr>
                        <td>- Insentif 3x gaji</td>
                    </tr>
                    <tr>
                        <td>- BPJS Ketenagakerjaan</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="grid mt-5">
            <p>Daftarkan dirimu dengan mengisi formulir <a href="https://form.jotform.com/Hastha/form"><span class="text-blue-500 hover:underline">DISINI</span></a></p>
        </div>
        <div class="grid mt-5">
            <span class="font-bold underline">PERINGATAN* </span>
        </div>
        <div class="grid mt-5">
            <p>Hati-hati atas upaya tindakan penipuan yang mengatasnamakan HasthaClub. Seluruh proses rekrutmen tidak dikenakan biaya apapun!
                Butuh informasi seputar rekrutmen? Hubungi tim rekrutmen kami melalui
                sambungan whatsapp berikut: 0882 0089 97382 (pesan akan kami respon padahari & jam kerja yang berlaku)</p>
        </div>
    </div>
    <div class="box"></div>
</div>
@endsection