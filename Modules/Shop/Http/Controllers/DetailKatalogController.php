<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\DashboardCustomer;

class DetailKatalogController extends Controller
{
    public function index()
    {
        return view('shop::katalog.detailKatalog');
    }
}
