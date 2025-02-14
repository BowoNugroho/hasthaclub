<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use Carbon\Carbon;

class CustomerAuthController extends Controller
{
    public function loginCs(Request $request)
    {
        $user_id = @auth('customer')->user()->id;
        $cek_cart = Cart::cekUser(@$user_id);
        $cartCount = CartItem::countCart(@$cek_cart->id);

        if (Auth::guard('customer')->check()) {
            return redirect('/shop/dashboardCs');
        } else {
            return view('shop::customer.login', compact('cartCount'));
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'no_hp' => 'required',
            'password' => 'required',
        ]);
        $credentials['status'] = 1;

        if (Auth::guard('customer')->attempt($credentials)) {

            $request->session()->regenerate();
            if (Auth::guard('customer')->check()) {
                $user = Customer::find(Auth::guard('customer')->user()->id);
                $user->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $request->getClientIp()
                ]);

                return redirect('/shop/dashboardCs');
            }
        }

        return back()->withErrors([
            'message' => 'Data yang dimasukan salah.',
        ]);
    }

    public function registerCs(Request $request)
    {
        return view('shop::customer.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'no_hp' => 'required|unique:users,no_hp',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'konfirm_password' => 'required|same:password',
            'status' => 'required',

        ]);
        $data = $request->except('konfirm_password', 'password');
        $data['password'] = Hash::make($request->password);
        $data['username'] = $request->no_hp;

        $user = User::create($data);
        $user->assignRole([4]);
        return redirect('/shop/loginCs');
    }

    public function logoutCs(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('shop::customer.login');
    }
}
