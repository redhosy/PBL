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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);
    
        $validated['password'] = bcrypt($validated['password']);
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
