<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Sesi Anda telah kedaluwarsa. Silakan login kembali.');
        }

        $user = Auth::user();

        // Pastikan objek user tidak null
        if (!$user) {
            return redirect('/login')->with('error', 'Sesi Anda telah kedaluwarsa. Silakan login kembali.');
        }

        // Lanjutkan dengan logika yang ada
        return view('dashboard.index', compact('user'));
    }
}
