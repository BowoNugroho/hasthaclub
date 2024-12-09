<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Capacity;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CapacityController extends Controller
{
    // Display DataTable view
    public function index()
    {
        return view('panel::capacity.index');
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'capacity_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
        $query = Capacity::query();  // Replace with, your actual model

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'capacity_name', 'deskripsi', 'created_at'];  // Define the columns you want to display
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
        $totalRecords = Capacity::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveCapacity(Request $request)
    {
        $validated = $request->validate([
            'capacity_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $data['capacity_name'] = $request->capacity_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['created_by'] = auth('web')->user()->id;
            $data['status'] = 1;

            $capacity = Capacity::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editCapacity(Request $request)
    {
        $capacity = Capacity::find($request->id);
        return response()->json($capacity);
    }

    public function updateCapacity(Request $request)
    {
        $validated = $request->validate([
            'capacity_name' => 'required|string|max:255',
            'deskripsi' => 'required',
        ]);

        try {

            $id = $request->capacity_id;
            $data['capacity_name'] = $request->capacity_name;
            $data['deskripsi'] = $request->deskripsi;
            $data['updated_by'] = auth('web')->user()->id;

            $capacity = Capacity::findOrFail($id);
            $capacity->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteCapacity(Request $request, $id)
    {
        try {
            // SoftDeleting
            Capacity::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Capacity not found'], 404);
        }
    }
}
