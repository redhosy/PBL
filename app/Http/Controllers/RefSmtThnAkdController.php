<?php

namespace App\Http\Controllers;

use App\Models\ref_smt_thn_akds;
use Illuminate\Http\Request;

class RefSmtThnAkdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_smtakad=ref_smt_thn_akds::all();
        return view('dashboard.thnakad.index',compact('data_smtakad'));
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
    public function show(ref_smt_thn_akds $ref_smt_thn_akd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ref_smt_thn_akds $ref_smt_thn_akd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_smt_thn_akds $ref_smt_thn_akd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ref_smt_thn_akds $ref_smt_thn_akd)
    {
        //
    }
}
