<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // Tambahkan ini
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider; // Tambahkan ini
use Symfony\Component\HttpFoundation\Response;

class AdminRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guard = empty($guard) ? [null] : $guards;
        if (Auth::guard($guard)->check()) {
            return redirect($guard.'/dashboard'); // ubah rute ini ke rute beranda yang diinginkan
        }

        return $next($request);
    }
}
