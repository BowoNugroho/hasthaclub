<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\DashboardCustomer;
use App\Models\Cart;
use App\Models\CartItem;

class KatalogController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'iPhone 14 128 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 15 128 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 13 128 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 15 256 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 14 256 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 13 256 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
        ];

        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return view('shop::katalog.index', compact('products', 'cartCount'));
    }
}
