<?php

namespace App\Http\Controllers\webstore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $posts = DB::table('users')->get();
        return view('webstore.layout.index', ['posts' => $posts]);
    }
}
