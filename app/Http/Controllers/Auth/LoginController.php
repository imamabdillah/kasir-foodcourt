<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Tampilkan halaman login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, alihkan pengguna ke halaman yang sesuai dengan peran (role) mereka
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'owner') {
                return redirect()->route('owner.dashboard');
            } elseif (Auth::user()->role === 'kasir') {
                return redirect()->route('menu.index');
            }
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->route('login')->with('error', 'Login gagal. Silakan coba lagi.');
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect()->route('login'); // Alihkan kembali ke halaman login
    }
}
