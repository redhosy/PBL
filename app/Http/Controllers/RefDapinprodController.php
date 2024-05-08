<?php

namespace App\Http\Controllers;

use App\Models\ref_dapinprod;
use Illuminate\Http\Request;

class RefDapinprodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data_pinprod=ref_dapinprod::latest();
        return view('dashboard.dapinprod.index',compact('data_pinprod'));
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
    public function show(ref_dapinprod $ref_dapinprod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ref_dapinprod $ref_dapinprod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_dapinprod $ref_dapinprod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ref_dapinprod $ref_dapinprod)
    {
        //
    }
}
