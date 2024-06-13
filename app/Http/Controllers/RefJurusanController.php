<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_jurusans;

class RefJurusanController extends Controller
{
    public function index(){
        $data_jur=ref_jurusans::latest()->paginate(5);
        return view('dashboard.dajur.index',compact('data_jur'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kodejurusan' => 'required',
            'jurusan' => 'required',
        ]);

        $data = new ref_jurusans();
        $data->kode_jurusan = $validated['kodejurusan'];
        $data->jurusan = $validated['jurusan'];
        $data->save();

        return response()->json(['data' => $data]);
    }
    public function show(string $id)
    {
        $data = ref_jurusans::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data]);
    }

    public function edit(string $id)
    {
        $data = ref_jurusans::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }

    public function update(Request $request, ref_jurusans $ref_jurusans)
    {
        $validated = $request->validate([
            'kodejurusan' => 'required',
            'jurusan' => 'required',
        ]);

        $ref_jurusans->update($validated);

        return response()->json(['data' => $ref_jurusans]);
    }

    public function destroy(string $id)
    {

        $kbk = ref_jurusans::find($id);

        if($kbk->delete()){
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message'=>'something went wrong']);
    }

}