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

        if (Auth::guard('web')->attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::guard('web')->check()) {
                $user = Auth::guard('web')->user();  // Using Auth::user() directly instead of querying by ID
                $user->update([
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => $request->getClientIp()
                ]);

                // Check the user's role and redirect accordingly
                if ($user->hasRole('customer')) { // Halaman customer
                    return redirect()->intended('dashboardCs');
                } else { // Halaman panel
                    return redirect()->route('panel.index');
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
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
