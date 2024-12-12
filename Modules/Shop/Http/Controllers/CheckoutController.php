<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\CartItem;
use App\Models\DashboardCustomer;
use App\Models\OrderItem;
use Spatie\Permission\Traits\HasRoles;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);
        $totalHarga = CartItem::sumHarga(@$request->id);
        $totalItem = CartItem::sumItem(@$request->id);

        $cekRole = Customer::cekRole($user_id);
        $role = $cekRole->role_name;

        //create checkout id
        $getStoreId = CartItem::getStoreId($request->id);
        $cekStore1 = Store::cekStore(@$user_id);
        $cekStore2 = $getStoreId;

        // $salesTo = $getStoreId->sales_to_id;

        $data['cart_id'] = $request->id;
        $data['user_id'] = $user_id;
        $data['store_id'] = $getStoreId->store_id;
        $data['sales_mitra_id'] = $getStoreId->sales_mitra_id;
        $data['sales_to_id'] = $getStoreId->sales_to_id;

        $cekCo = Checkout::cekCo($data);

        $co_id = NULL;
        if ($cekCo == NULL) {
            $co_id = $this->createCo($data);
        } else {
            $co_id = $cekCo->id;
        }


        if ($co_id) {
            return view('shop::checkout.index', compact('cartCount', 'totalHarga', 'totalItem', 'co_id', 'cekStore1', 'cekStore2', 'role'));
        } else {
            return view('shop::checkout.index');
        }
    }

    public function paymentRek(Request $request)
    {
        $totalHarga = OrderItem::sumHarga(@$request->co_id);
        $getInvoice = Checkout::getInvoice(@$request->co_id);
        $co_id = @$request->co_id;
        $invoice = @$getInvoice->invoice;

        return view('shop::checkout.payment',compact('totalHarga','co_id','invoice'));
    }

    public function createCo($dt)
    {

        try {
            $data['cart_id'] = $dt['cart_id'];
            $data['user_id'] = $dt['user_id'];
            $data['store_id'] = $dt['store_id'];
            $data['sales_mitra_id'] = $dt['sales_mitra_id'];
            $data['sales_to_id'] = $dt['sales_to_id'];
            $data['status'] = 1;

            $co = Checkout::create($data);
            $co_id = $co->id;

            return $co_id;
        } catch (\Exception $e) {
            $co_id = NULL;
            return $co_id;
        }
    }

    public function cekAkun(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $data = Checkout::getUser(@$user_id);
        return response()->json([
            'data' =>  $data,
        ]);
    }

    public function payment(Request $request)
    {

        try {
            $co_id = $request->co_id;
            $data['type_data'] = $request->type_data;
            $data['customer_name'] = $request->customer_name;
            $data['customer_no_hp'] = $request->customer_no_hp;
            $data['customer_email'] = $request->customer_email;
            $data['customer_alamat'] = $request->customer_alamat;
            $data['catatan'] = $request->catatan;
            $data['pick_up_type'] = @$request->type_pemesanan;
            $data['store_id'] = @$request->store_id;
            $data['total_harga'] = $request->total_harga;
            $data['order_status'] = 'PENDING';
            $data['status'] = 1;

            $checkout = Checkout::findOrFail($co_id);
            $checkout->update($data);

            // save order item
            $a = $this->saveOrderItem($co_id, @$request->store_id);
            $getCartId = Checkout::getCartId($co_id);
            $cart_id = $getCartId->cart_id;
            $this->deleteCartItem($cart_id);


            return response()->json([
                'success' => 'success',
                'co_id' => $co_id,
            ]);
        } catch (\Exception $e) {
            $checkout = NULL;
            return $checkout;
        }
    }

    public function saveOrderItem($id, $store_id)
    {
        $data = Checkout::getCartItem($id);
        try {
            foreach ($data as $item) {
                $dt['checkout_id'] = $item->co_id;
                $dt['product_variant_id'] = $item->product_variant_id;
                $dt['store_id'] = $store_id;
                $dt['sales_mitra_id'] = $item->sales_mitra_id;
                $dt['sales_to_id'] = $item->sales_to_id;
                $dt['qty'] = $item->qty;
                $dt['voucher_code'] = $item->voucher_code;
                $dt['voucher_id'] = $item->voucher_id;
                $dt['harga'] = $item->harga;
                $dt['total_harga'] = $item->total_harga;
                $dt['status'] = 1;

                OrderItem::create($dt);
            }

            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Item not found'], 404);
        }
    }

    public function deleteCartItem($cart_id)
    {
        try {

            $cartItem = CartItem::where('cart_id', $cart_id);
            $cartItem->delete();

            return $cart_id;

        } catch (\Exception $e) {
            return response()->json(['error' => 'Item not found'], 404);
        }
    }
}
