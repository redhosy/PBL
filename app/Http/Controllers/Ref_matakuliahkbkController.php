<?php

namespace App\Http\Controllers;

use App\Exports\matkulExport;
use App\Imports\matkulImport;
use App\Models\ActivityLog;
use App\Models\ref_datakbk;
use App\Models\ref_dosen;
use App\Models\ref_matakuliahkbk;
use App\Models\ref_prodis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $matkulkbk = ref_matakuliahkbk::with('dosen', 'kbk', 'prodi')->get();
        return view('dashboard.matkulkbk.index', compact('matkulkbk', 'dosen', 'prodi', 'kbk'));
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
            'kode_matkul' => 'required|string|max:10',
            'nama_matkul' => 'required|string|max:255',
            'semester' => 'required|integer|between:1,8',
            'ket' => 'required|integer|in:T,P,T/P',
            'kbk' => 'required|exists:ref_datakbks,id',
            'prodi' => 'required|exists:ref_prodis,id',
            'jumlah_sks' => 'required|integer|max:99',
            'pengampu' => 'required|exists:ref_dosens,id',
        ]);


        $data = new ref_matakuliahkbk();
        $data->kode_matkul = $validated['kode_matkul'];
        $data->nama_matkul = $validated['nama_matkul'];
        $data->semester = $validated['semester'];
        $data->ket = $validated['ket'];
        $data->id_datakbk = $validated['kbk'];
        $data->id_prodi = $validated['prodi'];
        $data->jumlah_sks = $validated['jumlah_sks'];
        $data->id_dosen = $validated['pengampu'];
        $data->save();

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data baru: ' . $data->nama,
        ]);

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ref_matakuliahkbk::with(['dosen', 'kbk', 'prodi'])->where('id', $id)->get();
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
        $data = ref_matakuliahkbk::with(['dosen', 'kbk', 'prodi'])->find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required|string',
            'nama_matkul' => 'required|string',
            'semester' => 'required|in:1,2,3,4,5,6,7,8',
            'ket' => 'required|string|in:T,P,T/P',
            'datakbk' => 'required|exists:ref_datakbks',
            'prodi' => 'required|exists:ref_prodis',
            'jumlahsks' => 'required|char',
            'dosen' => 'required|exists:ref_dosens',
        ]);

        $data = [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'semester' => $request->semester,
            'ket' => $request->ket,
            'id_datakbk' => $request->datakbk,
            'id_prodi' => $request->prodi,
            'jumlah_sks' => $request->jumlahsks,
            'id_dosen' => $request->dosen,
        ];

        $matkulkbk = ref_matakuliahkbk::where('kode_matkul', $request->kode_matkul)->first();
        if ($matkulkbk) {
            $matkulkbk->update($data);

            // Catat aktivitas
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'UPDATE',
                'description' => 'Update data baru: ' . $request->kode_matkul,
            ]);
            // $ref_matakuliahkbk = ref_matakuliahkbk::find($id)->update($validated);

            return response()->json(['message' => 'success', 'data' => $data]);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 400);
        }
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
