<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\Color;
use App\Models\Capacity;

class ProductVariantController extends Controller
{
    public function index()
    {
        $product = Product::where('status', 1)->get();
        $color = Color::where('status', 1)->get();
        $capacity = Capacity::where('status', 1)->get();
        return view('panel::productVariant.index', compact('color', 'capacity', 'product'));
    }

    public function datatables(Request $request)
    {
        $columns = ['id', 'product_name', 'color_name', 'capacity_name', 'harga', 'harga_diskon', 'stock', 'created_at'];  // Define the columns you want to display
        $query = ProductVariant::query()
            ->join('products as product', 'product_variants.product_id', '=', 'product.id')
            ->join('colors as color', 'product_variants.color_id', '=', 'color.id')
            ->join('capacities as capacity', 'product_variants.capacity_id', '=', 'capacity.id')
            ->select('product_variants.*', 'product.product_name', 'color.color_name', 'capacity.capacity_name');

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'harga', 'harga_diskon', 'stock', 'created_at']; // Define the columns you want to display
                foreach ($columns as $column) {
                    $query->orWhere('product_variants.' . $column, 'like', "%$search%")
                        ->orWhere('product.product_name', 'like', "%$search%")
                        ->orWhere('color.color_name', 'like', "%$search%")
                        ->orWhere('capacity.capacity_name', 'like', "%$search%");
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
        $totalRecords = ProductVariant::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveProductVariant(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'capacity_id' => 'required',
            'harga' => 'required',
            'harga_diskon' => 'required',
            'stock' => 'required',
        ]);

        try {

            $data['product_id'] = $request->product_id;
            $data['color_id'] = $request->color_id;
            $data['capacity_id'] = $request->capacity_id;
            $data['harga'] = $request->harga;
            $data['harga_diskon'] = $request->harga_diskon;
            $data['stock'] = $request->stock;
            $data['deskripsi'] = $request->deskripsi;
            $data['created_by'] = auth('web')->user()->id;
            $data['status'] = 1;

            $product = ProductVariant::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editProductVariant(Request $request)
    {
        $product = ProductVariant::find($request->id);
        return response()->json($product);
    }

    public function updateProductVariant(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'capacity_id' => 'required',
            'harga' => 'required',
            'harga_diskon' => 'required',
            'stock' => 'required',
        ]);

        try {

            $id = $request->product_variant_id;
            $productVariant = ProductVariant::findOrFail($id);

            $data['product_id'] = $request->product_id;
            $data['color_id'] = $request->color_id;
            $data['capacity_id'] = $request->capacity_id;
            $data['harga'] = $request->harga;
            $data['harga_diskon'] = $request->harga_diskon;
            $data['stock'] = $request->stock;
            $data['deskripsi'] = $request->deskripsi;
            $data['updated_by'] = auth('web')->user()->id;

            $productVariant->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteProductVariant(Request $request, $id)
    {
        try {
            // SoftDeleting
            ProductVariant::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
