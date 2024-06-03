<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;



class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('register');
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
        $Validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        $Validated['password']=bcrypt($Validated['password']);
        $Validated['email_verified_at']=now();
        $Validated['remember_token']=Str::random(10);


        User::create($Validated);
        return redirect('/login');
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
