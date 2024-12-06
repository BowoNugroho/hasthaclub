<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\DashboardCustomer;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $get = Store::getStore();
        $data = $get['data'];
        $count = $get['count'];
        return view('shop::store.index', compact('data', 'count'));
    }

    public function loadMoreStore(Request $request)
    {
        if ($request->ajax()) {
            $store = Store::getStoreList($request->page);
            $data = $store['data'];

            return view('shop::store.storeList', compact('data'))->render();
        }
    }

    public function updateStore(Request $request, $id)
    {
        $user_id = auth('customer')->user()->id;
        $store_id = $id;

        $updated = Store::updateUserStore($user_id, $store_id);
        if ($updated) {
            return redirect()->route('store')->with('success', 'Toko berhasil terpilih.');
        }

        return redirect()->route('store')->with('error', 'Data gagal / tidak diperbaharui');
    }
}
