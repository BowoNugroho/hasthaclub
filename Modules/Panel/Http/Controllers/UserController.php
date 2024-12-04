<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    // Display DataTable view
    public function index()
    {
        return view('panel::user.index');  // Create this view
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'name', 'email', 'no_hp', 'created_at'];  // Define the columns you want to display
        $query = User::query();  // Replace with your actual model

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
        $totalRecords = User::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    // Create new record
    public function store(Request $request)
    {
        $user = new User; 
        $user->create([
            'name' => $request->name,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'email' =>$request->email
        ]);

        return response()->json(['success' => 'User added successfully!']);
    }

    // Get data for editing
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'email' =>$request->email
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['success' => 'User deleted successfully!']);
    }
}
