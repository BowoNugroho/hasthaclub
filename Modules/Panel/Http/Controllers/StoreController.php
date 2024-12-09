<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoreController extends Controller
{
    // Display DataTable view
    public function index()
    {
        // $mitras = Store::getUserMitra();
        // $akuisisis = Store::getUserAkuisisi();
        $mitras = User::role('mitra')->get();
        $akuisisis = User::role('sales_mitra')->get();

        return view('panel::store.index', compact('mitras', 'akuisisis'));
    }

    // Fetch data for DataTable with server-side processing
    public function datatables(Request $request)
    {
        $columns = ['id', 'store_name', 'kota', 'email', 'no_hp', 'mitra_name', 'sales_mitra_name', 'created_at'];
        $query = Store::query()
            ->join('users as mitra', 'stores.mitra_id', '=', 'mitra.id')
            ->join('users as sales_mitra', 'stores.sales_mitra_id', '=', 'sales_mitra.id')
            ->select('stores.*', 'mitra.name as mitra_name', 'sales_mitra.name as sales_mitra_name');

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['id', 'store_name', 'kota', 'email', 'no_hp', 'created_at'];
                foreach ($columns as $column) {
                    $query->orWhere('stores.' . $column, 'like', "%$search%")
                        ->orWhere('mitra.name', 'like', "%$search%");
                    // ->orWhere('sales_mitra_name', 'like', "%$search%");
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
            'jam_operasional' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'alamat' => 'required',
            'mitra_id' => 'required',
            'sales_mitra_id' => 'required',
        ]);

        try {

            $data['store_name'] = $request->store_name;
            $data['no_hp'] = $request->no_hp;
            $data['email'] = $request->email;
            $data['jam_operasional'] = $request->jam_operasional;
            $data['kota'] = $request->kota;
            $data['provinsi'] = $request->provinsi;
            $data['alamat'] = $request->alamat;
            $data['mitra_id'] = $request->mitra_id;
            $data['sales_mitra_id'] = $request->sales_mitra_id;
            $data['created_by'] = auth('web')->user()->id;
            $data['status'] = 1;

            $store = Store::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
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
            'jam_operasional' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'alamat' => 'required',
            'mitra_id' => 'required',
            'sales_mitra_id' => 'required',
        ]);


        try {

            $id = $request->store_id;
            $data['store_name'] = $request->store_name;
            $data['no_hp'] = $request->no_hp;
            $data['email'] = $request->email;
            $data['jam_operasional'] = $request->jam_operasional;
            $data['kota'] = $request->kota;
            $data['provinsi'] = $request->provinsi;
            $data['alamat'] = $request->alamat;
            $data['mitra_id'] = $request->mitra_id;
            $data['sales_mitra_id'] = $request->sales_mitra_id;
            $data['updated_by'] = auth('web')->user()->id;

            $store = Store::findOrFail($id);
            $store->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteStore(Request $request, $id)
    {
        try {
            // SoftDeleting
            Store::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Store not found'], 404);
        }
    }
}
