<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InformasiController extends Controller
{
    public function partnership(Request $request)
    {
        return view('shop::informasi.partnership');
    }
    public function reseller(Request $request)
    {
        return view('shop::informasi.reseller');
    }
    public function layanan(Request $request)
    {
        return view('shop::informasi.layanan');
    }
    public function tentang(Request $request)
    {
        return view('shop::informasi.tentang');
    }
}
