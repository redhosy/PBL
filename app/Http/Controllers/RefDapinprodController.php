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
        if($request->has('cari')){
            $data_pim = ref_dapinprod::where('nama', 'like', '%' . $request->cari . '%')
                                ->orWhere('jabatan', 'like', '%' . $request->cari . '%')
                                ->get();
            $isEmpty=$data_pim->isEmpty();                    
        } else {
            $isEmpty=false;
            $data_pim = ref_dapinprod::with(['prodi','dosen','jabpim'])->paginate(10);
        }
        return view('dashboard.dapinprod.index')->with('data_pim', $data_pim);
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
