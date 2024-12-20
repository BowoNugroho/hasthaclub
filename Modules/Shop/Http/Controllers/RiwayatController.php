<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Sup
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Checkout;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

        return view('shop::customer.riwayatCs', compact('cartCount', 'dtCo'));
    }

    public function invoicePdf(Request $request)
    {
        $checkout = Checkout::query()
            ->where('id', $request->id)
            ->first();
        $orderitems = OrderItem::query()
            ->leftJoin('product_variants', 'order_items.product_variant_id', '=', 'product_variants.id')
            ->leftJoin('products', 'product_variants.product_id', '=', 'products.id')
            ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
            ->leftJoin('capacities', 'product_variants.capacity_id', '=', 'capacities.id')
            ->select('order_items.*', 'products.product_name', 'colors.color_name', 'capacities.capacity_name')
            ->where('order_items.checkout_id', $request->id)
            ->orderBy('order_items.created_at', 'desc')
            ->get();

        $path = public_path('public/modules/shop/images/hasthaclub.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dt = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($dt);

        $tgl_pembelian = $checkout->tgl_pembelian;
        $date_pembelian = Carbon::parse($tgl_pembelian);

        $data = [
            'checkout' => $checkout,
            'orderitems' => $orderitems,
            'base64' => $base64,
            'tgl_pembelian' => $date_pembelian,
        ];

        $pdf = Pdf::loadView('shop::customer.invoicePdf', $data);

        $options = $pdf->getDomPDF()->getOptions();
        $options->set('isRemoteEnabled', true);

        // Untuk mendownload PDF
        return $pdf->stream('invoice.pdf');
        // return $pdf->download('example.pdf');
    }
}
