<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('/login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
       }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        return redirect('/login')->with('error', 'Email atau password salah!');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
       }
}
