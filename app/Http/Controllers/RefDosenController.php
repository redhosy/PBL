<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_dosen;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;

use function PHPUnit\Framework\isEmpty;

class RefDosenController extends Controller
{
    public function index(){
        $jurusan = ref_jurusans::all();
        $prodi = ref_prodis::all();
        $data_dos=ref_dosen::with(['jurusan', 'prodi'])->get();
        return view('dashboard.dados.index',compact('data_dos', 'jurusan', 'prodi'));
    }    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jabpim' => 'required',
            'jurusan' => 'required',
            'nama' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'status' => 'required',
        ]);

        $periode = $validated['periode_start'] . '-' . $validated['periode_end'];

        $data = new ref_dosen();
        $data->id_jabatan_pimpinan = $validated['jabpim'];
        $data->id_jurusan = $validated['jurusan'];
        $data->id_dosen = $validated['nama'];
        $data->periode = $periode;
        $data->status = $validated['status'];
        $data->save();

        return response()->json(['data' => $data]);
    }

    public function show($id) {
        $data = ref_dosen::with(['prodi', 'jurusan'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = ref_dosen::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }
}
