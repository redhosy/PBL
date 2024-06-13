<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_prodis;
use App\Models\ref_jurusans;

use function Pest\Laravel\get;

class RefProdiController extends Controller
{
    public function index(){
        $jurusan = ref_jurusans::all();
        $data_pro=ref_prodis::with(['jurusan'])->paginate(5);
        return view('dashboard.dapro.index',compact('data_pro','jurusan'));
    }  

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kodeprodi' => 'required',
            'namaprodi' => 'required',
            'jurusan' => 'required',
            'jenjang' => 'required',
        ]);

        $data = new ref_prodis();
        $data->kode_prodi = $validated['kodeprodi'];
        $data->prodi = $validated['namaprodi'];
        $data->id_jurusan = $validated['jurusan'];
        $data->id_jenjang = $validated['jenjang'];
        $data->save();

        return response()->json(['data' => $data]);
    }

    public function show($id) {
        $data = ref_prodis::with(['jurusan'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = ref_prodis::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }

    public function update(Request $request, ref_prodis $ref_prodis)
    {
        $validated = $request->validate([
            'kodeprodi' => 'required',
            'namaprodi' => 'required',
            'jurusan' => 'required',
            'jenjang' => 'required',
        ]);

        $ref_prodis->update($validated);

        return response()->json(['data' => $ref_prodis]);
    }

    public function destroy(string $id)
    {

        $kbk = ref_prodis::find($id);

        if($kbk->delete()){
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message'=>'something went wrong']);
    }
}
