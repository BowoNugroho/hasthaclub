<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ProductBestSeller;
use App\Models\ProductVariant;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ProductBestController extends Controller
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
        return view('panel::productBestSeller.index', compact('products'));
    }

    public function datatables(Request $request)
    {
        $columns = ['id', 'product_name', 'created_at'];  // Define the columns you want to display
        $query = ProductBestSeller::query()
            ->join('product_variants', 'product_best_sellers.product_variant_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->select('product_best_sellers.*', 'products.product_name')
            ->orderBy('product_best_sellers.created_at', 'desc');

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'product_name', 'created_at'];  // Define the columns you want to display
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', "%$search%");
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
        $totalRecords = ProductBestSeller::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveProductBest(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id' => 'required',
            'status' => 'required',
        ]);

        try {

            $data['product_variant_id'] = $request->product_variant_id;
            $data['status'] = $request->status;

            $product = ProductBestSeller::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editProductBest(Request $request)
    {
        $productBest = ProductBestSeller::find($request->id);
        return response()->json($productBest);
    }

    public function updateProductBest(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id' => 'required',
            'status' => 'required',
        ]);

        try {

            $id = $request->product_best_id;
            $productBest = ProductBestSeller::findOrFail($id);

            $data['product_variant_id'] = $request->product_variant_id;
            $data['status'] = $request->status;
            $data['updated_by'] = auth('web')->user()->id;

            $productBest->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteProductBest(Request $request, $id)
    {
        try {
            // SoftDeleting
            ProductBestSeller::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
