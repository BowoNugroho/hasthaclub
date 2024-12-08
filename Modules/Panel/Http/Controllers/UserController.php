<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Support\Facades\DB;

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
            $query->where(function ($query) use ($search) {
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

    public function saveUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'required|unique:users,no_hp',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
        ]);

        try {

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['no_hp'] = $request->no_hp;
            $data['email'] = $request->email;
            $data['password'] = Hash::make('hastha');
            $data['status'] = 1;

            $user = User::create($data);

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Terjadi kesalahan, coba lagi.'], 500);
        }
    }

    public function editUser(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }

    public function updateUser(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);


        try {

            $id = $request->id;
            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['no_hp'] = $request->no_hp;
            $data['email'] = $request->email;

            $user = User::findOrFail($id);
            $user->update($validated);

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Terjadi kesalahan, coba lagi.'], 500);
        }
    }

    public function deleteUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id); // Find user by ID
            $user->delete(); // Delete the user

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
