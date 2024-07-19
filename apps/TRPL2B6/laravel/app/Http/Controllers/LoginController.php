<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('/login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        Log::info('Login attempt with email: '.$credentials['email'].' and password: '.$credentials['password']);

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman dashboard
            Log::info('Authentication passed for email: '.$credentials['email']);

            return redirect()->intended('pengguna');
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        Log::info('Authentication passed for email: '.$credentials['email']);

        return redirect('/login')->with('message', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
