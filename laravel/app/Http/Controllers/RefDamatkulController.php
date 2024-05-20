<?php

namespace App\Http\Controllers;

use App\Models\ref_damatkul;
use Illuminate\Http\Request;

class RefDamatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data_matkul=ref_damatkul::latest();
        return view('dashboard.matkul.index',compact('data_matkul'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ref_damatkul $ref_damatkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ref_damatkul $ref_damatkul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_damatkul $ref_damatkul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ref_damatkul $ref_damatkul)
    {
        //
    }
}
