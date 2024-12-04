<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        $id = auth('customer')->user()->id;
        $data = Customer::find($id);
        // echo "<pre>";
        // var_dump($data);
        // die;
        return view('shop::customer.informasiCs');
    }
}
