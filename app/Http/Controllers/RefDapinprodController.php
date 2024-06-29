<?php

namespace App\Http\Controllers;

use App\Models\ref_dapinprod;
use App\Models\ref_dosen;
use App\Models\jabpims;
use App\Models\ref_prodis;
use Illuminate\Http\Request;

class RefDapinprodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dosen = ref_dosen::all();
        $prodi = ref_prodis::all();
        $jabpim = jabpims::all();
        $data_pim = ref_dapinprod::with(['prodi', 'dosen', 'jabpim'])->paginate(5);
        $years = range(date('Y') - 50, date('Y') + 10);
        return view('dashboard.dapinprod.index', compact('data_pim', 'years', 'dosen', 'prodi','jabpim'));
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
            'nama' => 'required',
            'prodi' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'status' => 'required',
        ]);

        $periode = $validated['periode_start'] . '-' . $validated['periode_end'];

        $data = new ref_dapinprod();
        $data->id_jabatan_pimpinan = $validated['jabpim'];
        $data->id_dosen = $validated['nama'];
        $data->id_prodi = $validated['prodi'];
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
        $data = ref_dapinprod::with(['jabpim', 'dosen', 'prodi'])->find($id);
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
        $data = ref_dapinprod::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ref_dapinprod $ref_dapinprod)
    {
        $validated = $request->validate([
            'jabpim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'periode' => 'required',
            'status' => 'required',
        ]);

        $ref_dapinprod->update($validated);

        return response()->json(['data' => $ref_dapinprod]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kbk = ref_dapinprod::find($id);

        if ($kbk->delete()) {
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message' => 'something went wrong']);
    }
}
