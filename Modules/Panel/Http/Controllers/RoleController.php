<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

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
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'name', 'created_at'];  // Define the columns you want to display
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
    public function saveRole(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,NULL,id,guard_name,' . $request->guard_name,
            'guard_name' => 'required',
        ], [
            'name.unique' => 'The combination of name and guard name must be unique.',
        ]);

        try {

            $data['name'] = $request->name;
            $data['guard_name'] = $request->guard_name;

            $role = Role::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editRole(Request $request)
    {
        $user = Role::find($request->id);
        return response()->json($user);
    }

    public function updateRole(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,NULL,id,guard_name,' . $request->guard_name,
            'guard_name' => 'required',
        ], [
            'name.unique' => 'The combination of name and guard name must be unique.',
        ]);


        try {

            $id = $request->id;

            $role = Role::findOrFail($id);
            $role->update($validated);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteRole(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Role not found'], 404);
        }
    }
}
