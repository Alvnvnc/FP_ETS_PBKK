<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah diautentikasi dan apakah is_admin adalah 1
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request); // Lanjutkan request jika pengguna adalah admin
        }

        // Redirect ke halaman home dengan pesan error jika bukan admin
        return redirect(route('home'))->with('error', 'You have not admin access');
    }
}
