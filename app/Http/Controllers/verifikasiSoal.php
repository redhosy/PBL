<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ref_smt_thn_akds;
use App\Models\ref_damatkul;
use App\Models\ref_dosen;
use App\Models\verifikasi_soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class verifikasiSoal extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = ref_dosen::all();
        $thnakd = ref_smt_thn_akds::all();
        $damatkul = ref_damatkul::all();
        $soal = verifikasi_soal::with('kode_matkul', 'thnakd', 'dosen')->get();
        return view('dashboard.verifikasiSoal.index', compact('soal', 'dosen', 'thnakd', 'damatkul'));
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
        $data = $request->validate([
            'kodesoal' => 'required|string|max:10',
            'dosen_pengampu' => 'required|exists:ref_dosens,id',
            'kode_matkul' => 'required|exists:ref_damatkuls,id',
            'dokumen' => 'required|file|mimes:pdf|max:2048',
            'tanggal' => 'required|date',
            'thnakd' => 'required|exists:ref_smt_thn_akds,id',
        ]);

        $data = [
            'kodeSoal' => $request->kodesoal,
            'id_dosen' => $request->dosen_pengampu,
            'id_kodeMatkul' => $request->kode_matkul,
            'tanggal' => $request->tanggal,
            'id_smt_thn_akd' => $request->thnakd
        ];

        $fileName = '';
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = now()->format('YmdHis') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/dokumentVerifikasiHasilSoal', $fileName);
            $data['document'] = $fileName;
        }

        // Simpan data ke database
        $soal = verifikasi_soal::create($data);


        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data RPS baru: ' . $request->KodeSoal,
        ]);

        return response()->json(['data' => $fileName]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = verifikasi_soal::with('dosen', 'kode_matkul', 'thnakd')->where('id', $id)->get();
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
        $data = verifikasi_soal::find($id);
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
            'kodesoal' => 'required|string|max:10',
            'dosen_pengampu' => 'required|exists:ref_dosens,id',
            'kode_matkul' => 'required|exists:ref_damatkuls,id',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'tanggal' => 'required|date',
            'thnakd' => 'required|exists:ref_smt_thn_akds,id',
        ]);

        $soal = verifikasi_soal::where('id',$id)->first();

        $data = [
            'kodeSoal' => $request->kodesoal,
            'id_dosen' => $request->dosen_pengampu,
            'id_KodeMatkul' => $request->kode_matkul,
            'document' => $request->dokumen,
            'tanggal' => $request->tanggal,
            'id_smt_thn_akd' => $request->thnakd
        ];
        $uploadOk = false;

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = now()->format('YmdHis') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/dokumentVerifikasiHasilSoal', $fileName);
            $data['document'] = $fileName;
        }

        if ($uploadOk) {
            Storage::delete('public/dokumentVerifikasiHasilSoal/' . $soal->document);
            $file->store('dokumentVerifikasiHasilSoal', $fileName);
        }
        $soal->update($data);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' =>'Updated Soal: ' . $soal->kodeSoal,
        ]);

        return response()->json(['data' => $soal]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kbk = verifikasi_soal::find($id);
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
