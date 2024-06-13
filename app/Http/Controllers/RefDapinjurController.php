<?php

namespace App\Http\Controllers;

use App\Models\jabpims;
use App\Models\ref_dapinjurs;
use App\Models\ref_dosen;
use App\Models\ref_jurusans;
use Illuminate\Http\Request;
class RefDapinjurController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $jurusan = ref_jurusans::all();
        $dosen = ref_dosen::all();
        $jabpim = jabpims::all();
        $data_pim = ref_dapinjurs::with(['jurusan', 'dosen', 'jabpim'])->paginate(5);
        $years = range(date('Y') - 50, date('Y') + 10);
        return view('dashboard.dapinjur.index', compact('data_pim', 'jurusan', 'years', 'dosen','jabpim'));
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
            'jabpim' => 'required',
            'jurusan' => 'required',
            'nama' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'status' => 'required',
        ]);

        $periode = $validated['periode_start'] . '-' . $validated['periode_end'];

        $data = new ref_dapinjurs();
        $data->id_jabatan_pimpinan = $validated['jabpim'];
        $data->id_jurusan = $validated['jurusan'];
        $data->id_dosen = $validated['nama'];
        $data->periode = $periode;
        $data->status = $validated['status'];
        $data->save();

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = ref_dapinjurs::with(['jabpim', 'dosen', 'jurusan'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }


    public function edit(string $id)
    {
        $data = ref_dapinjurs::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_dapinjurs $ref_dapinjurs)
    {
        $validated = $request->validate([
            'jabpim' => 'required',
            'jurusan' => 'required',
            'nama' => 'required',
            'periode' => 'required',
            'status' => 'required',
        ]);

        $ref_dapinjurs->update($validated);

        return response()->json(['data' => $ref_dapinjurs]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kbk = ref_dapinjurs::find($id);

        if ($kbk->delete()) {
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message' => 'something went wrong']);
    }
}
