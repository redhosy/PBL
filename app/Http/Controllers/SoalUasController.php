<?php

namespace App\Http\Controllers;

use App\Models\soalUas;
use Illuminate\Http\Request;

class SoalUasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.soalUAs.index');
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
    public function show(soalUas $soalUas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(soalUas $soalUas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, soalUas $soalUas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(soalUas $soalUas)
    {
        //
    }
}
