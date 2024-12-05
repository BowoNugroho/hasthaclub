<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Display DataTable view
    public function index()
    {
        return view('panel::role.index');  // Create this view
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'name', 'created_at'];  // Define the columns you want to display
        $query = Role::query();  // Replace with your actual model

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function($query) use ($search) {
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
        $totalRecords = Role::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }
}
