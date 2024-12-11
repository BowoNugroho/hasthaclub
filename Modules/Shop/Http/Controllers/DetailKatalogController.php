<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\DashboardCustomer;

class DetailKatalogController extends Controller
{
    public function index()
    {
        return view('shop::katalog.detailKatalog');
    }
    public function detailKatalog(Request $request, $id)
    {
        $product = ProductVariant::getProductVariantby1($id);
        $productWarna = ProductVariant::getProductVariantWarnaby1($product->product_id);
        $productKapasitas = ProductVariant::getProductVariantKapasitasby1($product->product_id);
        return view('shop::katalog.detailKatalog', compact('product', 'productWarna', 'productKapasitas'));
    }

    public function cekProduct(Request $request)
    {
        $data['color_id'] = $request->color_id;
        $data['capacity_id'] = $request->capacity_id;
        $data['product_id'] = $request->product_id;

        $productbyVariant = ProductVariant::getProductVariantby2($data);
        return response()->json($productbyVariant);
    }
}
