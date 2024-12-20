<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVOICE | {{ $checkout->invoice }}</title>
    <style type="text/css">
        body,table tr td{
            font-family: 'Arial';
            font-size: 13px!important;
        }
        h1{font-weight: bold; font-size: 16px;}
        h2{font-weight: bold; font-size: 13px;}
        table { border-collapse: collapse;}
        table td { padding: 3px; }
        .border-all { border: 1px solid #000; }
        .border-top { border-top: 1px solid #000; }
        .border-top2 { border-top: 3px solid #fff; }
        .border-bottom { border-bottom: 1px solid #000; }
        .border-left { border-left: 1px solid #000; }
        .border-right { border-right: 1px solid #000; }
        .bold { font-weight: bold; }
        .left { text-align: left!important; }
        .right { text-align: right!important; }
        .center { text-align: center!important; }
        .italic { font-style: italic;!important; }
        .small { font-size: 9px; }

        .watermark {
            position: absolute;
            top: 20%;
            left: 0;
            width: 100%;
            height: 30%;
            transform:  rotate(-45deg); 
            background-image: url('{{ $base64 }}');
            background-size: contain; /* Mengubah ukuran gambar agar sesuai */
            background-repeat: no-repeat; /* Tidak mengulang gambar */
            background-position: center; 
            opacity: 0.1; /* Transparansi watermark */
            z-index: -1;
        }
        </style>
</head>
<body>
    <div class="watermark"></div>
    {{-- <table style="width: 100%; border-collapse: collapse;" border="1"> --}}
        <table style="width: 100%">
            <tr>
                <td style=" width: 50%; text-align: left;" rowspan="2"> 
                    <img src="{{ $base64 }}" style="height: 60px;" alt="Logo">
                </td>
                <td valign="top" style="text-align: right;">
                    <h3 style="margin: 0;">INVOICE</h3>
                </td>
            </tr>
            <tr>
                <td valign="top" style="text-align: right;">
                    <h5 style="margin: 0; color:#3B82F6 ;font-size: 15px;"># {{ $checkout->invoice }}</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%;margin-top: 20;margin-left: 10;">
            <tr>
                <td style="width: 60%;font-weight: bold;">DITERBIKAN OLEH :</td>
                <td style="font-weight: bold;">UNTUK :</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">PT Gayeon Industri Persada</td>
                <td style="font-weight: bold;">{{ $checkout->customer_name }}</td>
            </tr>
        </table>
        <table style="width: 100%;margin-top: 0;margin-left: 10;">
            <tr>
                <td style="width: 60%;font-weight: bold;"></td>
                <td style="">{{ $checkout->customer_no_hp }}</td>
            </tr>
            <tr>
                <td style=""></td>
                <td style="">{{ $tgl_pembelian->format('d F Y') }}</td>
            </tr>
            <tr>
                <td style=""></td>
                <td style="">{{ $checkout->customer_alamat }}</td>
            </tr>
        </table>
        <table class="" style="width: 100%;margin-top: 30;margin-left: 10;">
            <tr style="background-color:rgba(59, 130, 246, 0.5)">
                <td style="width: 30%; height:25px;  ">INFO PRODUK</td>
                <td style="width: 10%; text-align: right; ">JUMLAH</td>
                <td style="width: 20%; text-align: right; ">HARGA @</td>
                <td style="width: 20%; text-align: right; ">VOUCHER</td>
                <td style="width: 20%; text-align: right; ">TOTAL HARGA</td>
            </tr>
        </table>
    <table class="border-top2" style="width: 100%;margin-top: 0;margin-left: 10;">
        @foreach ($orderitems as $val)
            <tr class="border-top2" style="background-color: rgba(160, 163, 170, 0.1)"> 
                <td style="width: 30%;height:30px; font-weight: bold; " rowspan="2">&nbsp;&nbsp; <span style="color:#3B82F6"> {{ $val->product_name }} </span> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $val->capacity_name }} &nbsp;{{ $val->color_name }} </td>
                <td style="width: 10%; text-align: right;" rowspan="2">{{ $val->qty }}</td>
                <td style="width: 20%; text-align: right;" rowspan="2">Rp. {{ number_format($val->harga, 0, ',', '.') }}</td>
                <td style="width: 20%; text-align: right;" rowspan="2">Rp. {{ number_format($val->potongan_harga, 0, ',', '.') }}</td>
                <td style="width: 20%; text-align: right;" rowspan="2">Rp. {{ number_format($val->total_harga, 0, ',', '.') }}</td>
            </tr>
            <tr style="background-color: rgba(160, 163, 170, 0.1)"></tr>
        @endforeach
    </table> 
    <table class="border-top" style="width: 100%;margin-top: 10;margin-left: 10;"></table>
    <table style="width: 100%;margin-top: 0;margin-left: 10;">
        <tr>
            <td style="width: 30%;height:30px;" rowspan="2"> </td>
            <td style="width: 10%; text-align: right;"></td>
            <td style="width: 20%; text-align: right;"></td>
            <td style="width: 20%; text-align: right;height:30px;">TOTAL HARGA</td>
            <td style="width: 20%; text-align: right;height:30px;font-weight: bold;">Rp. {{ number_format($checkout->total_harga, 0, ',', '.') }}</td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td>STATUS PEMBAYARAN : 
                @if ($checkout->status_pembayaran == 0)
                    <span style="background-color: #ef4444; color: #fff; padding: 5px 10px; border-radius: 10px; font-size: 12px;">BELUM</span>
                @else
                    <span style="background-color: #22c55e; color: #fff; padding: 5px 10px; border-radius: 10px; font-size: 12px;">SUDAH</span>
                @endif
            </td>
            <td class="small italic" style="text-align: right;">Terakhir Update : {{ $checkout->updated_at->format('d F Y') }}</td>
        </tr>
    </table>  
</body>
</html>