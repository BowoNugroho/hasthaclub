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
        $data = Store::getStore();
        return view('shop::store.index', compact('data'));
    }
    public function updateStore(Request $request, $id)
    {
        echo "<pre>";
        var_dump('masuk');
        die;
    }
}
