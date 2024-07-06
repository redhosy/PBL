<?php

namespace App\Http\Controllers;

use App\Exports\matkulExport;
use App\Imports\matkulImport;
use App\Models\ActivityLog;
use App\Models\ref_damatkul;
use App\Models\ref_datakbk;
use App\Models\ref_dosen;
use App\Models\ref_matakuliahkbk;
use App\Models\ref_prodis;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Ref_matakuliahkbkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = ref_dosen::all();
        $kbk = ref_datakbk::all();
        $prodi = ref_prodis::all();
        $matkul = ref_damatkul::all();
        $matkulkbk = ref_matakuliahkbk::with('dosen', 'kbk', 'prodi', 'matkul')->get();
        return view('dashboard.matkulkbk.index', compact('matkulkbk', 'dosen', 'prodi', 'kbk', 'matkul'));
    }

    public function matkulExport()
    {

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'EXPORT',
            'description' => 'Mengimpor data dari file Excel',
        ]);

        return Excel::download(new matkulExport, 'matkulkbk.xlsx');
    }

    public function matkulImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new matkulImport, $request->file('file'));

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'IMPORT',
            'description' => 'Mengimpor data dari file Excel',
        ]);

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
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
            'matkul_id' => 'required|exists:ref_damatkuls,id',
            'kbk' => 'required|exists:ref_datakbks,id',
            'prodi' => 'required|exists:ref_prodis,id',
            'pengampu' => 'required|exists:ref_dosens,id',
        ]);

        $matkul = ref_damatkul::findOrFail($validated['matkul_id']);

        $data = [
            'id_matkul' => $matkul->id,
            'kode_matakuliah' => $matkul->kode_matakuliah,
            'nama_matakuliah' => $matkul->nama_matakuliah,
            'semester' => $matkul->semester,
            'TP' => $matkul->TP,
            'sks' => $matkul->jumlah_sks,
            'id_datakbk' => $validated['kbk'],
            'id_prodi' => $validated['prodi'],
            'id_dosen' => $validated['pengampu'],
        ];

        ref_matakuliahkbk::create($data);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data baru: ' . $matkul->nama_matakuliah,
        ]);

        return response()->json(['data' => $data]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ref_matakuliahkbk::with(['dosen', 'matkul', 'kbk', 'prodi'])->where('id', $id)->get();
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
        $data = ref_matakuliahkbk::with(['dosen', 'matkul', 'kbk', 'prodi'])->find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'editmatkul_id' => 'required|exists:ref_damatkuls,id',
            'kbk' => 'required|exists:ref_datakbks,id',
            'prodi' => 'required|exists:ref_prodis,id',
            'pengampu' => 'required|exists:ref_dosens,id',
        ]);

        // Logging untuk memeriksa nilai ID yang diterima
        Log::info('Update request received with ID: ' . $id);

        // Periksa apakah data ref_matakuliahkbk ada
        $data = ref_matakuliahkbk::find($id);
        if (!$data) {
            return response()->json(['error' => 'Data not found.'], 404);
        }

        // Cari data ref_damatkul berdasarkan editmatkul_id
        $matkul = ref_damatkul::findOrFail($validated['editmatkul_id']);

        // Update data
        $data->id_matkul = $matkul->id;
        $data->kode_matakuliah = $matkul->kode_matakuliah;
        $data->nama_matakuliah = $matkul->nama_matakuliah;
        $data->semester = $matkul->semester;
        $data->TP = $matkul->TP;
        $data->sks = $matkul->jumlah_sks;
        $data->id_datakbk = $validated['kbk'];
        $data->id_prodi = $validated['prodi'];
        $data->id_dosen = $validated['pengampu'];

        $data->save();

        // Catat aktivitas update
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' => 'Mengubah data: ' . $matkul->nama_matakuliah,
        ]);

        return response()->json(['data' => $data]);
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kbk = ref_matakuliahkbk::find($id);
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'DELETE',
            'description' => 'menghapus data: ' . $id
        ]);

        if ($kbk->delete()) {
            return response()->json(['success' => true]);
        }
        return  response()->json(['status' => 404, 'message' => 'something went wrong']);
    }
}
