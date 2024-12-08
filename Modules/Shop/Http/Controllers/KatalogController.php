<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\DashboardCustomer;

class KatalogController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'iPhone 14 128 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 15 128 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 13 128 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 15 256 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 14 256 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
            ['name' => 'iPhone 13 256 Blue', 'harga_normal' => 12999000, 'harga_promo' => 10999000],
        ];
        return view('shop::katalog.index', compact('products'));
    }
}
