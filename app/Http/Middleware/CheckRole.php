<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request);
        }
        return redirect('landingpage'); // Ganti dengan rute yang sesuai jika peran tidak valid.
    }
}
