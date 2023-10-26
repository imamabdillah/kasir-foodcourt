<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMenuPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna masuk.
        if (!auth()->check()) {
            return redirect('/login'); // Alihkan pengguna ke halaman masuk jika belum masuk.
        }

        // Periksa izin untuk operasi CRUD. Misalnya, Anda dapat memeriksa peran pengguna.
        if (!auth()->user()->hasPermission('manage_menus')) {
            return redirect('/home')->with('error', 'Anda tidak memiliki izin untuk mengelola menu.');
        }

        return $next($request);
    }
}
