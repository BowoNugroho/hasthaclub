<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function logoutCs(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('shop::customer.login');
    }
}
