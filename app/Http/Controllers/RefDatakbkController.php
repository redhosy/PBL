<?php

namespace App\Http\Controllers;

use App\Models\ref_datakbk;
use Illuminate\Http\Request;

class RefDatakbkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_datakbk=ref_datakbk::latest();
        return view('dashboard.datakbk.index',compact('data_datakbk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.datakbk.create', ['ref_datakbks'=>ref_datakbk::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namakbk' => 'required',
            'kodekbk' => 'required',
            'deskripsi' => 'required',
        ]);
        ref_datakbk::create($validated);
        return redirect('/dashboard-datakbk')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ref_datakbk $ref_datakbk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ref_datakbk $ref_datakbk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_datakbk $ref_datakbk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ref_datakbk $ref_datakbk)
    {
        //
    }
}
