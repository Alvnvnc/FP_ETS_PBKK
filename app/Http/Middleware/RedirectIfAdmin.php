<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has an admin role
        if (Auth::check() && Auth::user()->is_admin) {
            // Allow admin users to proceed
            return $next($request);
        }

        // Redirect non-admin users to their dashboard
        return redirect()->route('user.dashboard');
    }
}
