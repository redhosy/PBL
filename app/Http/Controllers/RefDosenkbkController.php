<?php

namespace App\Http\Controllers;

use App\Models\r;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use App\Models\RefDosenkbk;
use Illuminate\Http\Request;

class RefDosenkbkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kbk_jur=ref_jurusans::all();
        $kbk_pro=ref_prodis::all();
        $dosenkbk = RefDosenkbk::all();
        // $dosenkbk = RefDosenkbk::latest()->paginate(10);
        $statuses = [
            '1' => 'Aktif',
            '0' => 'Tidak-Aktif'
        ];
        return view('dashboard.dosenkbk.index')->with([
            'data_jur'=>$kbk_jur,
            'dosenkbk'=>$dosenkbk,
            'data_pro'=>$kbk_pro,
            'statuses'=>$statuses
        ]);
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
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'status' => 'required|in:1,0',
        ]);

        $data = new RefDosenkbk();
        $data->kodekbk = $validated['nip'];
        $data->nama = $validated['nama'];
        $data->deskripsi = $validated['email'];
        $data->deskripsi = $validated['jurusan'];
        $data->deskripsi = $validated['prodi'];
        $data->status = $request->status;
        $data->save();

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = RefDosenkbk::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = RefDosenkbk::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RefDosenkbk $RefDosenkbk)
    {
        $validated = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'status' => 'required|in:1,0',
        ]);

        $RefDosenkbk->update($validated);
        $RefDosenkbk->status = $request->status;
        return response()->json(['data' => $RefDosenkbk]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kbk = RefDosenkbk::find($id);

        if($kbk->delete()){
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message'=>'something went wrong']);
    }
}
