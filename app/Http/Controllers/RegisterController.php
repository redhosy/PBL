<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use App\Models\RefDosenkbk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        $kbk_jur=ref_jurusans::all();
        $kbk_pro=ref_prodis::all();
        $dosenkbk = RefDosenkbk::all();
        // $dosenkbk = RefDosenkbk::latest()->paginate(10);
        $statuses = [
            '1' => 'Aktif',
            '0' => 'Tidak-Aktif'
        ];
        return view('register')->with([
            'data_jur'=>$kbk_jur,
            'dosenkbk'=>$dosenkbk,
            'data_pro'=>$kbk_pro,
            'statuses'=>$statuses
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:18',
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users|max:255',
            'password' => ['required', 'string','max:8', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha'
        ], [
            // 'nip.required' => 'NIP wajib diisi.',
            // 'nip.max' => 'NIP maksimal 18 karakter.',
            // 'name.required' => 'Nama wajib diisi.',
            // 'email.required' => 'Email wajib diisi.',
            // 'email.email' => 'Format email tidak valid.',
            // 'email.unique' => 'Email sudah terdaftar.',
            // 'password.required' => 'Password wajib diisi.',
            // 'password.min' => 'Password minimal 8 karakter.',
            'captcha.required' => 'Captcha wajib diisi.',
            'captcha.captcha' => 'Captcha tidak valid.'
        ]);
    
        $validated['password'] = Hash::make($validated['password']);
        $validated['email_verified_at'] = now();
        $validated['remember_token'] = Str::random(10);
    
        User::create($validated);
    
        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
