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
        if($request->has('cari')){
            $data_damat = ref_damatkul::where('nama', 'like', '%' . $request->cari . '%')
                                ->orWhere('jabatan', 'like', '%' . $request->cari . '%')
                                ->get();
            $isEmpty=$data_damat->isEmpty();                    
        } else {
            $isEmpty=false;
            $data_damat = ref_damatkul::with(['kurikulum'])->paginate(10);
        }
        return view('dashboard.matkul.index')->with('data_damat', $data_damat);
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
