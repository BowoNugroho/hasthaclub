<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\DashboardCustomer;
use App\Models\Cart;
use App\Models\Color;
use App\Models\CartItem;
use App\Models\ProductVariant;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);


        $products = CartItem::getProduct(@$cek_cart->id);
        $totalHarga = CartItem::sumHarga(@$cek_cart->id);
        return view('shop::cart.index', compact('cartCount', 'products', 'totalHarga'));
    }

    public function deleteCart($id)
    {
        try {
            $cartItem = CartItem::findOrFail($id);
            $cartItem->delete();

            $user_id = @auth('customer')->user()->id;
            $cek_cart = Cart::cekUser(@$user_id);
            $cartCount = CartItem::countCart(@$cek_cart->id);
            $totalHarga = CartItem::sumHarga(@$cek_cart->id);

            return response()->json([
                'totalHarga' =>  number_format($totalHarga, 0, ',', '.'),
                'cartCount' => $cartCount,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Item not found'], 404);
        }
    }
}
