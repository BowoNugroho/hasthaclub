<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Sup
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Checkout;

class RiwayatController extends Controller
{
    public function index()
    {
        // $post = auth()->user()->id;
        // $name = auth()->user()->name;
        // echo "<pre>";
        // var_dump($post);
        // var_dump($name);
        // die;
        // $post = User::findOrFail($id);
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        $dtCo = Checkout::getRiwayatCo($user_id);

        return view('shop::customer.riwayatCs', compact('cartCount','dtCo'));
    }
}
