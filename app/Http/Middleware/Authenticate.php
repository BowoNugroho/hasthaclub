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
        $url = $request->server('PATH_INFO') ?? $request->path();
        $segments = explode('/', $url);

        $admin = ['panel'];
        $shop = ['shop', 'dashboardCs', 'store', 'informasi-partnership', 'riwayatCs', 'updateCs'];

        if (@in_array($segments[0], $admin)) {
            return route('login');
        } elseif (@in_array($segments[0], $shop)) {
            return route('customer.loginCs');
        }
        // return $request->expectsJson() ? null : route('login');
    }
}
