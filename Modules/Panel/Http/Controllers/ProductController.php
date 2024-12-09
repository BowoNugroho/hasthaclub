<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductController extends Controller
{
    // Display DataTable view
    public function index()
    {
        return view('panel::product.index');
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'product_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
        $query = Product::query();  // Replace with, your actual model

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'product_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
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
        $totalRecords = Product::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $data['product_name'] = $request->product_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['created_by'] = auth('web')->user()->id;
            $data['status'] = 1;

            $product = Product::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editProduct(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json($product);
    }

    public function updateProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $id = $request->product_id;
            $data['product_name'] = $request->product_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['updated_by'] = auth('web')->user()->id;

            $product = Product::findOrFail($id);
            $product->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteProduct(Request $request, $id)
    {
        try {
            // SoftDeleting
            Product::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
