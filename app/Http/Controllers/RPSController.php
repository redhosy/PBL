<?php

namespace App\Http\Controllers;

use App\Models\ref_smt_thn_akds;
use App\Models\ref_damatkul;
use App\Models\RPS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ver_rps = ref_smt_thn_akds::all();
        $damatkul = ref_damatkul::all();
        $rps = RPS::all();
        
        return view('dashboard.RPS.index')->with([
            'kode_matkul' => $damatkul,
            'versi' => $ver_rps,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'koderps' => 'required|string',
            'kode_matkul' => [
                'required',
                Rule::exists('ref_damatkul', 'kode_matkul'),
            ],
            'versi' => [
                'required',
                Rule::exists('ref_smt_thn_akds', 'versi'),
            ],
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'dosen' => 'required|string',
        ]);

        // Simpan dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen_rps', 'public');
        }

        // Simpan data ke database
        $rps = RPS::create($validatedData);

        return response()->json(['message' => 'Data berhasil disimpan', 'data' => $rps]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RPS $rPS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RPS $rPS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RPS $rPS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RPS $rPS)
    {
        //
    }
}
