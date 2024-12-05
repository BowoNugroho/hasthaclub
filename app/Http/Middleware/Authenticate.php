<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request, ...$guards): ?string
    {
        $req = $request->server('PATH_INFO');

        if ($req == '/panel') {
            return route('login');
        } elseif ($req == '/dashboardCs') {
            return route('customer.loginCs');
        } else {
            return route('customer.loginCs');
        }
        // return $request->expectsJson() ? null : route('login');
    }
}
