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

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $data['category'] = $request->category;
        $data['search_product'] = $request->input('search_product');
        $colors = $request->input('colors', []);

        $productVariant = ProductVariant::getProductVariantbySeacrh($data, $colors);
        $color = Color::getColor();
        $products = $productVariant['data'];
        $productCount = $productVariant['count'];


        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        if ($request->ajax()) {
            return response()->json([
                'products_html' => view('shop::katalog.productList', compact('products'))->render(),
                'cartCount' => $cartCount,
                'productCount' => $productCount,
            ]);
        }

        return view('shop::katalog.index', compact('products', 'cartCount', 'color', 'productCount'));
    }
}
