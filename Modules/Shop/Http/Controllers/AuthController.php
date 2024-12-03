<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function loginCs(Request $request)
    {

        if (Auth::check()) {
            return redirect('/dashboardCs');
        } else {
            return view('shop::customer.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'no_hp' => 'required',
            'password' => 'required',
        ]);
        $credentials['status'] = 1;


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                $user->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $request->getClientIp()
                ]);

                return redirect('/dashboardCs');
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

        User::create($data);
        return redirect('/loginCs');
    }

    public function logoutCs(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('shop::customer.login');
    }
}
