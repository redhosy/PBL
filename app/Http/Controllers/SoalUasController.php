<?php

namespace App\Http\Controllers;

use App\Models\ref_smt_thn_akds;
use App\Models\ref_damatkul;
use App\Models\soalUas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SoalUasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_akd = ref_smt_thn_akds::all();
        $damatkul = ref_damatkul::all();
        $soalUas = soalUas::all();
        
        return view('dashboard.soalUas.index')->with([
            'kode_matkul' => $damatkul,
            'tahunakademik' => $tahun_akd,
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
        // Validasi data
        $validatedData = $request->validate([
            'kodesoal' => 'required|string',
            'kode_matkul' => [
                'required',
                Rule::exists('ref_damatkul', 'kode_matkul'),
            ],
            'tahunakademik' => [
                'required',
                Rule::exists('ref_smt_thn_akds', 'tahunakademik'),
            ],
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'dosen' => 'required|string',
        ]);

        // Simpan dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen_soal', 'public');
        }

        // Simpan data ke database
        $soalUas = soalUas::create($validatedData);

        return response()->json(['message' => 'Data berhasil disimpan', 'data' => $soalUas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(soalUas $soalUas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(soalUas $soalUas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, soalUas $soalUas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(soalUas $soalUas)
    {
        //
    }
}
