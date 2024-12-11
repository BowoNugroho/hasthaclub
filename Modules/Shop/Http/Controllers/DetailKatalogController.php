<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Voucher;
use App\Models\Store;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\DashboardCustomer;

class DetailKatalogController extends Controller
{
    public function index()
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);
        return view('shop::katalog.detailKatalog', compact('cartCount'));
    }

    public function counCart(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        return response()->json($cartCount);
    }

    public function detailKatalog(Request $request, $id)
    {
        // keranjang
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);
        // end keranjang

        $product = ProductVariant::getProductVariantby1(@$id);
        $productWarna = ProductVariant::getProductVariantWarnaby1(@$product->product_id);
        $productKapasitas = ProductVariant::getProductVariantKapasitasby1(@$product->product_id);
        return view('shop::katalog.detailKatalog', compact('product', 'productWarna', 'productKapasitas', 'cartCount'));
    }

    public function cekProduct(Request $request)
    {
        $data['color_id'] = $request->color_id;
        $data['capacity_id'] = $request->capacity_id;
        $data['product_id'] = $request->product_id;

        $productbyVariant = ProductVariant::getProductVariantby2($data);
        return response()->json($productbyVariant);
    }

    public function cekVoucher(Request $request)
    {
        $voucher = $request->voucher;

        $cekVoucher = Voucher::cehkVoucher($voucher);
        return response()->json($cekVoucher);
    }

    public function addCart(Request $request)
    {
        $voucher = $request->voucher;
        $product_variant_id = $request->product_variang_id;
        $qty = $request->qty;
        $user_id = $request->user_id;

        $get_store = Voucher::cehkVoucher($voucher);
        $get_detail_product = ProductVariant::getProductVariantbyId1($product_variant_id);
        $get_sales_mitra_id = Store::getSalesMitraId($get_store->store_id);
        $cek_cart = Cart::cekUser($user_id);

        $cart_id = NULL;
        if ($cek_cart == NULL) {
            // save to cart
            $cart_id = $this->saveCart($user_id);
        } else {
            $cart_id = $cek_cart->id;
        }
        // cek product yang di tambah keranjang dengan product variant id yang sama
        $cek_product = CartItem::cekCartItembyProductVariantId($product_variant_id, $cart_id);

        if ($cek_product == NULL) {
            // save to cart item
            $data['product_variant_id'] = $product_variant_id;
            $data['voucher_code'] = $voucher;
            $data['voucher_id'] = $get_store->id;
            $data['store_id'] = $get_store->store_id;
            $data['sales_to_id'] = $get_store->sales_to_id;
            $data['qty'] = $qty;
            $data['harga'] = $get_detail_product->harga;
            $data['harga_diskon'] = $get_detail_product->harga_diskon;
            $data['sales_mitra_id'] = $get_sales_mitra_id->sales_mitra_id;
            $data['cart_id'] = $cart_id;

            $save_cart_item = $this->saveCartItem($data);

            return response()->json(['success' => true], 200);
        } else {


            $data['product_variant_id'] = $product_variant_id;
            $data['voucher_code'] = $voucher;
            $data['voucher_id'] = $get_store->id;
            $data['store_id'] = $get_store->store_id;
            $data['sales_to_id'] = $get_store->sales_to_id;
            $data['qty'] = $qty + $cek_product->qty;
            $data['harga'] = $get_detail_product->harga;
            $data['harga_diskon'] = $get_detail_product->harga_diskon;
            $data['sales_mitra_id'] = $get_sales_mitra_id->sales_mitra_id;
            $data['cart_id'] = $cart_id;
            $data['cart_item_id'] = $cek_product->id;

            $update_cart_item = $this->updateCartItem($data);

            return response()->json(['success' => true], 200);
        }
    }

    public function saveCart($user_id)
    {
        try {
            $data['user_id'] = $user_id;
            $data['status'] = 1;

            $cart = Cart::create($data);
            $cart_id = $cart->id;

            return $cart_id;
        } catch (\Exception $e) {
            $cart_id = NULL;
            return $cart_id;
        }
    }

    public function saveCartItem($dt)
    {
        try {
            $data['product_variant_id'] = $dt['product_variant_id'];
            $data['voucher_code'] = $dt['voucher_code'];
            $data['voucher_id'] =  $dt['voucher_id'];
            $data['store_id'] = $dt['store_id'];
            $data['sales_to_id'] = $dt['sales_to_id'];
            $data['qty'] = $dt['qty'];
            $data['harga'] = $dt['harga_diskon'];
            $data['total_harga'] = $dt['qty'] * $dt['harga_diskon'];
            $data['sales_mitra_id'] = $dt['sales_mitra_id'];
            $data['cart_id'] = $dt['cart_id'];
            $data['status'] = 1;

            $cartItem = CartItem::create($data);

            return $cartItem;
        } catch (\Exception $e) {
            $cartItem = NULL;
            return $cartItem;
        }
    }

    public function updateCartItem($dt)
    {
        try {
            $id = $dt['cart_item_id'];
            $data['product_variant_id'] = $dt['product_variant_id'];
            $data['voucher_code'] = $dt['voucher_code'];
            $data['voucher_id'] =  $dt['voucher_id'];
            $data['store_id'] = $dt['store_id'];
            $data['sales_to_id'] = $dt['sales_to_id'];
            $data['qty'] = $dt['qty'];
            $data['harga'] = $dt['harga_diskon'];
            $data['total_harga'] = $dt['qty'] * $dt['harga_diskon'];
            $data['sales_mitra_id'] = $dt['sales_mitra_id'];
            $data['cart_id'] = $dt['cart_id'];
            $data['status'] = 1;
            $data['updated_by'] = @auth('customer')->user()->id;

            $cartItem = CartItem::findOrFail($id);
            $cartItem->update($data);

            return $cartItem;
        } catch (\Exception $e) {
            $cartItem = NULL;
            return $cartItem;
        }
    }
}
