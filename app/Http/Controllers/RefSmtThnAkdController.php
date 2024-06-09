<?php

namespace App\Http\Controllers;

use App\Models\ref_smt_thn_akds;
use Illuminate\Http\Request;

class RefSmtThnAkdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data_smtakad=ref_smt_thn_akds::latest()->paginate(5);
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
    public function show(string $id)
    {
        $data = ref_smt_thn_akds::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data]);
    }

    public function edit(string $id)
    {
        $data = ref_smt_thn_akds::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
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
