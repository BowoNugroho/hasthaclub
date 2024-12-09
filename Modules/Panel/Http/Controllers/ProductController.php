<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display DataTable view
    public function index()
    {
        $brand = Brand::where('status',1)->get();
        $category = Category::where('status',1)->get();

        return view('panel::product.index', compact('brand', 'category'));
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'product_name', 'deskripsi','category_name','brand_name', 'created_at'];  // Define the columns you want to display
        $query = Product::query()
                        ->join('brands as brand', 'products.brand_id', '=', 'brand.id')
                        ->join('categories as category', 'products.category_id', '=', 'category.id')
                        ->select('products.*', 'brand.brand_name', 'category.category_name');

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
            'harga' => 'required',
            'deskripsi' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'product_img' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validate the image
        ]);

        try {

            $imagePath = null;
            if ($request->hasFile('product_img')) {
                $imagePath = $request->file('product_img')->store('product_images', 'public');
            }

            $data['product_name'] = $request->product_name;
            $data['harga'] = $request->harga;
            $data['deskripsi'] = $request->deskripsi;
            $data['product_img'] = $imagePath;
            $data['brand_id'] = $request->brand_id;
            $data['category_id'] = $request->category_id;
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
            'harga' => 'required',
            'deskripsi' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'product_img' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // Validate the image
        ]);

        try {

            $id = $request->product_id;
            $product = Product::findOrFail($id);

            $imagePath = $product->product_img;
            if ($request->hasFile('product_img')) {
                if (Storage::exists('public/' . $product->product_img)) {
                    Storage::delete('public/' . $product->product_img);
                }
                $imagePath = $request->file('product_img')->store('product_images', 'public');
            }

            $data['product_name'] = $request->product_name;
            $data['harga'] = $request->harga;
            $data['deskripsi'] = $request->deskripsi;
            $data['product_img'] = $imagePath;
            $data['brand_id'] = $request->brand_id;
            $data['category_id'] = $request->category_id;
            $data['updated_by'] = auth('web')->user()->id;

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
