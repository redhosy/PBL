<?php

namespace App\Http\Controllers;

use App\Models\ref_damatkul;
use Illuminate\Http\Request;

class RefDamatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data_damat=ref_damatkul::latest()->paginate(10);
        return view('dashboard.matkul.index',compact('data_damat'));
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
    public function show($id) {
        $data = ref_damatkul::with(['id_kurikulum'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = ref_damatkul::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
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
