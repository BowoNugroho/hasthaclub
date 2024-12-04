<?php

namespace Modules\Shop\Http\Controllers;

// use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RiwayatController extends Controller
{
    public function index()
    {
        // $post = auth()->user()->id;
        // $name = auth()->user()->name;
        // echo "<pre>";
        // var_dump($post);
        // var_dump($name);
        // die;
        // $post = User::findOrFail($id);
        return view('shop::customer.riwayatCs');
    }
}
