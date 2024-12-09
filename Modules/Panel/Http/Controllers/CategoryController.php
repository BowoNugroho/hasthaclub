<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('panel::category.index');  // Create this view
    }
    public function datatables(Request $request)
    {
        $columns = ['id', 'category_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
        $query = Category::query();  // Replace with, your actual model

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'category_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
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
        $totalRecords = Category::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $data['category_name'] = $request->category_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['created_by'] = auth('web')->user()->id;
            $data['status'] = 1;

            $category = Category::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editCategory(Request $request)
    {
        $category = Category::find($request->id);
        return response()->json($category);
    }

    public function updateCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $id = $request->category_id;
            $data['category_name'] = $request->category_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['updated_by'] = auth('web')->user()->id;

            $category = Category::findOrFail($id);
            $category->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteCategory(Request $request, $id)
    {
        try {
            // SoftDeleting
            Category::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
