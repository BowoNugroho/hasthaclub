<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Store;

class StoreController extends Controller
{
    // Display DataTable view
    public function index()
    {
        return view('panel::store.index');  // Create this view
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'name', 'email', 'no_hp', 'created_at'];  // Define the columns you want to display
        $query = Store::query();  // Replace with your actual model

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'name', 'email', 'no_hp', 'created_at']; // Define the columns you want to displays
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
        $totalRecords = Store::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveStore(Request $request)
    {
        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'no_hp' => 'required|unique:stores,no_hp',
            'email' => 'required|unique:stores,email',
        ]);

        try {

            $data['store_name'] = $request->store_name;
            $data['no_hp'] = $request->no_hp;
            $data['email'] = $request->email;
            $data['password'] = Hash::make('hastha');
            $data['status'] = 1;

            $store = Store::create($data);

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Terjadi kesalahan, coba lagi.'], 500);
        }
    }

    public function editStore(Request $request)
    {
        $store = Store::find($request->id);
        return response()->json($store);
    }

    public function checkHp(Request $request)
    {
        $exists = Store::where('no_hp', $request->no_hp)->exists();

        if ($exists) {
            $data['status'] = '1';
            $data['pesan'] = 'no handphone sudah ada';
            return response()->json($data);
        } else {
            $data['status'] = '0';
            $data['pesan'] = 'no handphone tersedia';
            return response()->json($data);
        }
    }
    public function checkEmail(Request $request)
    {
        $exists = Store::where('email', $request->email)->exists();

        if ($exists) {
            $data['status'] = '1';
            $data['pesan'] = 'email sudah ada';
            return response()->json($data);
        } else {
            $data['status'] = '0';
            $data['pesan'] = 'email tersedia';
            return response()->json($data);
        }
    }

    public function updateStore(Request $request)
    {

        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'no_hp' => 'required',
            'email' => 'required',
        ]);


        try {

            $id = $request->id;
            $data['store_name'] = $request->store_name;
            $data['no_hp'] = $request->no_hp;
            $data['email'] = $request->email;

            $store = Store::findOrFail($id);
            $store->update($validated);

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Terjadi kesalahan, coba lagi.'], 500);
        }
    }

    public function deleteStore(Request $request, $id)
    {
        try {
            $store = Store::findOrFail($id); // Find store by ID
            $store->delete(); // Delete the store

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Store not found'], 404);
        }
    }
}
