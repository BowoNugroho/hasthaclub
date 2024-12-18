<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ProdukCheckout;
use App\Models\Voucher;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class VoucherController extends Controller
{
    // Display DataTable view
    public function index()
    {
        $stores = Store::query()
            ->whereNull('stores.deleted_at')
            ->orderBy('stores.created_at', 'desc')
            ->get();
        $sales = User::query()
            ->leftJoin('model_has_roles as model_role', 'users.id', '=', 'model_role.model_id')
            ->leftJoin('roles as role', 'model_role.role_id', '=', 'role.id')
            ->select('users.*')
            ->where('role.name', 'sales_to')
            ->whereNull('users.deleted_at')
            ->orderBy('users.created_at', 'desc')
            ->get();

        return view('panel::voucher.index', compact('stores', 'sales'));
    }

    public function datatables(Request $request)
    {
        $columns = ['id', 'voucher_name', 'voucher_code', 'potongan_harga', 'store_name', 'sales_name', 'created_at'];  // Define the columns you want to display
        $query = Voucher::query()
            ->leftJoin('stores', 'vouchers.store_id', '=', 'stores.id')
            ->leftJoin('users', 'vouchers.sales_to_id', '=', 'users.id')
            ->select('vouchers.*', 'stores.store_name', 'users.name as sales_name')
            ->orderBy('vouchers.created_at', 'desc');

        // Apply search filter
        if ($search = $request->input('search.value')) {
            $query->where(function ($query) use ($search) {
                $columns = ['voucher_name', 'voucher_code', 'created_at'];  // Define the columns you want to display
                foreach ($columns as $column) {
                    $query->orWhere('vouchers.' . $column, 'like', "%$search%")
                        ->orWhere('stores.store_name', 'like', "%$search%")
                        ->orWhere('users.name', 'like', "%$search%");
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
        $totalRecords = Voucher::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function cekKodeVoucher(Request $request)
    {
        $exists = Voucher::where('voucher_code', $request->voucher_code)->exists();

        if ($exists) {
            $data['status'] = '1';
            $data['pesan'] = 'kode voucher sudah ada';
            return response()->json($data);
        } else {
            $data['status'] = '0';
            $data['pesan'] = 'kode voucher tersedia';
            return response()->json($data);
        }
    }

    public function saveVoucher(Request $request)
    {
        $validated = $request->validate([
            'voucher_name' => 'required',
            'voucher_code' => 'required|unique:vouchers,voucher_code',
            'potongan_harga' => 'required',
        ]);

        try {

            $data['voucher_name'] = $request->voucher_name;
            $data['voucher_code'] = $request->voucher_code;
            $data['potongan_harga'] = $request->potongan_harga;
            $data['store_id'] = $request->store_id;
            $data['sales_to_id'] = $request->sales_to_id;
            $data['status'] = 1;

            $vouhcher = Voucher::create($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editVoucher(Request $request)
    {
        $voucher = Voucher::find($request->id);
        return response()->json($voucher);
    }

    public function updateVoucher(Request $request)
    {
        $validated = $request->validate([
            'voucher_name' => 'required',
            'voucher_code' => 'required',
            'potongan_harga' => 'required',
        ]);

        try {

            $id = $request->voucher_id;
            $data['voucher_name'] = $request->voucher_name;
            $data['voucher_code'] = $request->voucher_code;
            $data['potongan_harga'] = $request->potongan_harga;
            $data['store_id'] = $request->store_id;
            $data['sales_to_id'] = $request->sales_to_id;
            $data['status'] = 1;

            $vouhcher = Voucher::findOrFail($id);
            $vouhcher->update($data);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function deleteVoucher(Request $request, $id)
    {
        try {
            // SoftDeleting
            Voucher::find($id)->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
