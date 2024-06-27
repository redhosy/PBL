<?php

namespace App\Http\Controllers;

use App\Exports\datakbkExport;
use App\Models\ActivityLog;
use App\Models\ref_datakbk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\datakbkImport;

class RefDatakbkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakbk = ref_datakbk::all();
        return view('dashboard.datakbk.index', compact('datakbk'));
    }

    public function datakbkExport(){

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'EXPORT',
            'description' => 'Mengimpor data dari file Excel',
        ]);

        return Excel::download(new datakbkExport, 'datakbk.xlsx');
    }

    public function datakbkImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new datakbkImport, $request->file('file'));

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
        //return view('dashboard.datakbk.create', ['ref_datakbks' => ref_datakbk::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kodekbk' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            
        ]);

        $data = new ref_datakbk();
        $data->kodekbk = $validated['kodekbk'];
        $data->nama = $validated['nama'];
        $data->deskripsi = $validated['deskripsi'];
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
        $data = ref_datakbk::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ref_datakbk::find($id);
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
            'kodekbk' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $ref_datakbk= ref_datakbk::find($id)->update($validated);

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' => 'Update data baru: ' . $ref_datakbk
        ]);

        return response()->json(['data' => $ref_datakbk]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kbk = ref_datakbk::find($id);
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
