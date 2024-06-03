<?php

namespace App\Http\Controllers;

use App\Models\ref_datakbk;
use Illuminate\Http\Request;

class RefDatakbkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakbk = ref_datakbk::all();
        return view('dashboard.datakbk.index', compact('datakbk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('dashboard.datakbk.create', ['ref_datakbks' => ref_datakbk::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kodekbk' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = new ref_datakbk();
        $data->kodekbk = $validated['kodekbk'];
        $data->nama = $validated['nama'];
        $data->deskripsi = $validated['deskripsi'];
        $data->save();

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ref_datakbk::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ref_datakbk::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_datakbk $ref_datakbk)
    {
        $validated = $request->validate([
            'kodekbk' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $ref_datakbk->update($validated);

        return response()->json(['data' => $ref_datakbk]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kbk = ref_datakbk::find($id);

        if($kbk->delete()){
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message'=>'something went wrong']);
    }
}
