<?php

namespace App\Http\Controllers;

use App\Models\ref_dakur;
use Illuminate\Http\Request;

class RefDakurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_kur = ref_dakur::where('nama', 'like', '%' . $request->cari . '%')
                                ->orWhere('jabatan', 'like', '%' . $request->cari . '%')
                                ->get();
            $isEmpty=$data_kur->isEmpty();                    
        } else {
            $isEmpty=false;
            $data_kur = ref_dakur::with(['prodi'])->paginate(10);
        }
        return view('dashboard.dakur.index')->with('data_kur', $data_kur);
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
    public function show(ref_dakur $ref_dakur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ref_dakur $ref_dakur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_dakur $ref_dakur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ref_dakur $ref_dakur)
    {
        //
    }
}
