<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Brand;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandController extends Controller
{
    // Display DataTable view
    public function index()
    {
        return view('panel::brand.index');
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'brand_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
        $query = Brand::query();  // Replace with, your actual model

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'brand_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
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
        $totalRecords = Brand::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $data['brand_name'] = $request->brand_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['created_by'] = auth('web')->user()->id;
            $data['status'] = 1;

            $brand = Brand::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editBrand(Request $request)
    {
        $brand = Brand::find($request->id);
        return response()->json($brand);
    }

    public function updateBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $id = $request->brand_id;
            $data['brand_name'] = $request->brand_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['updated_by'] = auth('web')->user()->id;

            $brand = Brand::findOrFail($id);
            $brand->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteBrand(Request $request, $id)
    {
        try {
            // SoftDeleting
            Brand::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Brand not found'], 404);
        }
    }
}
