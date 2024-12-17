<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ProdukCheckout;
use App\Models\ProductVariant;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ProductCheckoutController extends Controller
{
    // Display DataTable view
    public function index()
    {
        $products = ProductVariant::query()
            ->leftJoin('products', 'product_variants.product_id', '=', 'products.id')
            ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
            ->leftJoin('capacities', 'product_variants.capacity_id', '=', 'capacities.id')
            ->select('product_variants.id', 'products.product_name', 'colors.color_name', 'capacities.capacity_name')
            ->get();
        return view('panel::productCheckout.index', compact('products'));
    }

    public function datatables(Request $request)
    {
        $columns = ['id', 'product_name', 'color_name', 'capacity_name', 'created_at'];  // Define the columns you want to display
        $query = ProdukCheckout::query()
            ->join('product_variants', 'produk_checkouts.product_variant_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->join('colors', 'product_variants.color_id', '=', 'colors.id')
            ->join('capacities', 'product_variants.capacity_id', '=', 'capacities.id')
            ->select('produk_checkouts.*', 'products.product_name', 'colors.color_name', 'capacities.capacity_name')
            ->orderBy('produk_checkouts.created_at', 'desc');

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'created_at'];  // Define the columns you want to display
                foreach ($columns as $column) {
                    $query->orWhere('produk_checkouts.' . $column, 'like', "%$search%")
                        ->orWhere('products.product_name', 'like', "%$search%");
                }
            });
        }

        // Apply sorting
        if ($order = $request->input('order')) {
            $columnIndex = $order[0]['column'];
            $direction = $order[0]['dir'];
            $query->orderBy($columns[$columnIndex], $direction);
        }

        // Apply pagination
        $length = $request->input('length', 10);
        $start = $request->input('start', 0);

        $data = $query->offset($start)->limit($length)->get();
        $totalRecords = ProdukCheckout::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveProductCheckout(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id' => 'required',
            'status' => 'required',
        ]);

        try {

            $data['product_variant_id'] = $request->product_variant_id;
            $data['status'] = $request->status;

            $product = ProdukCheckout::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editProductCheckout(Request $request)
    {
        $productBest = ProdukCheckout::find($request->id);
        return response()->json($productBest);
    }

    public function updateProductCheckout(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id' => 'required',
            'status' => 'required',
        ]);

        try {

            $id = $request->product_checkout_id;
            $productCheckout = ProdukCheckout::findOrFail($id);

            $data['product_variant_id'] = $request->product_variant_id;
            $data['status'] = $request->status;
            $data['updated_by'] = auth('web')->user()->id;

            $productCheckout->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteProductCheckout(Request $request, $id)
    {
        try {
            // SoftDeleting
            ProdukCheckout::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
