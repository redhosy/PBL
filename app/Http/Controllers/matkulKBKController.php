<?php

namespace App\Http\Controllers;

use App\Models\matkulKBKs;
use Illuminate\Http\Request;

class matkulKBKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkulkbk = matkulKBKs::all();
        return view('dashboard.matkulkbk.index', compact('matkulkbk'));
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
        $validated = $request->validate([
            'KodeMatkul' => 'required',
            'Nama' => 'required',
            'Jumlahsks' => 'required',
        ]);

        $data = new matkulKBKs();
        $data->KodeMatkul = $validated['KodeMatkul'];
        $data->Nama = $validated['Nama'];
        $data->Jumlahsks = $validated['Jumlahsks'];
        $data->save();

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = matkulKBKs::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = matkulKBKs::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, matkulKBKs $matkulKBKs)
    {
        $validated = $request->validate([
            'KodeMatkul' => 'required',
            'Nama' => 'required',
            'Jumlahsks' => 'required',
        ]);

        $matkulKBKs->update($validated);

        return response()->json(['data' => $matkulKBKs]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kbk = matkulKBKs::find($id);

        if($kbk->delete()){
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message'=>'something went wrong']);
    }
}
