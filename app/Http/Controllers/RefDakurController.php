<?php

namespace App\Http\Controllers;

use App\Models\ref_dakur;
use Illuminate\Http\Request;

class RefDakurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data_kur=ref_dakur::latest()->paginate(5);
        return view('dashboard.dakur.index',compact('data_kur'));
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
        $data = ref_dakur::with(['prodi'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit(string $id)
    {
        $data = ref_dakur::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
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
