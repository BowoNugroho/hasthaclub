<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Cart;
use App\Models\CartItem;

class InformasiController extends Controller
{
    public function partnership(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.partnership', compact('cartCount'));
    }
    public function reseller(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.reseller', compact('cartCount'));
    }
    public function layanan(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.layanan', compact('cartCount'));
    }
    public function tentang(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.tentang', compact('cartCount'));
    }
    public function syarat(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.syarat', compact('cartCount'));
    }
    public function return(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.return', compact('cartCount'));
    }

    public function karir(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::informasi.karir', compact('cartCount'));
    }
}
