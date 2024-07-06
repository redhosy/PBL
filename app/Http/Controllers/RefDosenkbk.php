<?php

namespace App\Http\Controllers;

use App\Imports\dosenkbkImport;
use App\Exports\dosenkbkExport;
use App\Models\ActivityLog;
use App\Models\jabpims;
use App\Models\ref_datakbk;
use App\Models\ref_dosen;
use App\Models\ref_dosenkbk;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RefDosenkbk extends Controller
{
    public function index()
    {
        $dosen = ref_dosen::all();
        $datakbk = ref_datakbk::all();
        $prodi = ref_prodis::all();
        $jurusan = ref_jurusans::all();
        $jabatan = jabpims::all();
        $dosenkbk = ref_dosenkbk::with(['kbk', 'dosen', 'prodi', 'jurusan', 'jabatan'])->get();
        return view('dashboard.dosenkbk.index', compact('dosenkbk', 'dosen', 'prodi', 'jurusan', 'datakbk', 'jabatan'));
    }

    public function dosenkbkExport()
    {

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'EXPORT',
            'description' => 'Mengimpor data dari file Excel',
        ]);

        return Excel::download(new dosenkbkExport, 'dosenkbk.xlsx');
    }

    public function dosenkbkImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new dosenkbkImport, $request->file('file'));

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'IMPORT',
            'description' => 'Mengimpor data dari file Excel',
        ]);

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|exists:ref_dosens,id',
            'kbk' => 'required|exists:ref_datakbks,id',
            'jabatan' => 'required|exists:jabpims,id',
            'status' => 'required|in:0,1',
        ]);

        $dosen = ref_dosen::findOrFail($validated['dosen_id']);

        $data = new ref_dosenkbk();
        $data->id_dosen = $dosen->id;
        $data->nama = $dosen->nama;
        $data->nip = $dosen->nip;
        $data->email = $dosen->email;
        $data->id_jurusan = $dosen->id_jurusan;  // Pastikan hanya menyimpan ID
        $data->id_prodi = $dosen->id_prodi;      // Pastikan hanya menyimpan ID
        $data->id_datakbk = $validated['kbk'];
        $data->id_jabatan = $validated['jabatan'];
        $data->status = $validated['status'];
        $data->save();

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data baru: ' . $data->nama,
        ]);

        return response()->json(['data' => $data]);
    }


    public function show($id)
    {
        $data = ref_dosenkbk::with(['dosen', 'prodi', 'kbk', 'jurusan', 'jabatan'])->where('id', $id)->get();
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = ref_dosenkbk::with(['dosen', 'prodi', 'kbk', 'jurusan', 'jabatan'])->find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'editdosen' => 'required|exists:ref_dosens,id',
            'kbk' => 'required|exists:ref_datakbks,id',
            'jabatan' => 'required|exists:jabpims,id',
            'status' => 'required|in:0,1',
        ]);

        // Cari data ref_dosenkbk berdasarkan ID
        $data = ref_dosenkbk::findOrFail($id);

        // Ambil data dosen terkait
        $dosen = ref_dosen::findOrFail($validated['editdosen']);

        // Update atribut-atribut pada $data dengan data yang baru
        $data->id_dosen = $dosen->id;
        $data->nama = $dosen->nama;
        $data->nip = $dosen->nip;
        $data->email = $dosen->email;
        $data->id_jurusan = $dosen->id_jurusan;  // Pastikan hanya menyimpan ID
        $data->id_prodi = $dosen->id_prodi;      // Pastikan hanya menyimpan ID
        $data->id_datakbk = $validated['kbk'];
        $data->id_jabatan = $validated['jabatan'];
        $data->status = $validated['status'];
        $data->save();

        // Catat aktivitas update
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' => 'Mengubah data: ' . $data->nama,
        ]);

        return response()->json(['data' => $data]);
    }


    public function destroy(string $id)
    {

        $kbk = ref_dosenkbk::find($id);
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
