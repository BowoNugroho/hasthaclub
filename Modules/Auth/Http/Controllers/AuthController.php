<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function username()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            $this->username() => 'required',
            'password' => 'required',
        ]);
        $credentials['status'] = 1;

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::check()) {
                $user = Auth::user();  // Using Auth::user() directly instead of querying by ID
                $user->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $request->getClientIp()
                ]);

                // Check the user's role and redirect accordingly
                if ($user->hasRole('admin')) {
                    return redirect()->route('admin.index');
                } elseif ($user->hasRole('shop')) {
                    return redirect()->route('shop.index');
                } else {
                    return redirect()->intended('/');
                }
            }

            
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
            'message' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
