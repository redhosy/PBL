<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\soalUas;
use Illuminate\Http\Request;
=======
use App\Models\ActivityLog;
use App\Models\ref_smt_thn_akds;
use App\Models\ref_damatkul;
use App\Models\ref_dosen;
use App\Models\soalUas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
>>>>>>> Stashed changes

class SoalUasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< Updated upstream
        return view('dashboard.soalUAs.index');
=======
        $dosen = ref_dosen::all();
        $thnakd = ref_smt_thn_akds::all();
        $damatkul = ref_damatkul::all();
        $soal = soalUas::with('kode_matkul', 'thnakd', 'dosen')->get();
        return view('dashboard.soalUas.index', compact('soal', 'dosen', 'thnakd', 'damatkul'));
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        //
=======
        // Validasi data
        $validated = $request->validate([
            'kodesoal' => 'required|string|max:10',
            'dosen_pengampu' => 'required|exists:ref_dosens,id',
            'kode_matkul' => 'required|exists:ref_damatkuls,id',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'tanggal' => 'required|date',
            'thnakd' => 'required|exists:ref_smt_thn_akds,id',
        ]);

        $data = new soalUas();
        $data->KodeSoal = $validated['kodesoal'];
        $data->id_dosen = $validated['dosen_pengampu'];
        $data->id_KodeMatkul = $validated['kode_matkul'];
        $data->tanggal = $validated['tanggal'];
        $data->id_smt_thn_akd = $validated['thnakd'];

        // Simpan dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen_soal', 'public');
            $data->Dokumen = $validated['dokumen']; // Pastikan sesuai dengan nama kolom di tabel
        }

        // Simpan data ke database
        $data->save();

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data Soal UAS baru: ' . $data->KodeSoal,
        ]);

        return response()->json(['data' => $data]);
>>>>>>> Stashed changes
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = soalUas::with('dosen', 'kode_matkul', 'thnakd')->where('id', $id)->get();
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
        $data = soalUas::find($id);
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

        $data = soalUas::findOrFail($id);

        $changes = [];
        foreach ($validated as $key => $value) {
            if ($data[$key] != $value) {
                $changes[$key] = [
                    'old' => $data[$key],
                    'new' => $value
                ];
            }
        }

        // Simpan dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $filePath = $request->file('dokumen')->store('dokumen_soal', 'public');
            $validated['dokumen'] = $filePath;

            if ($data->Dokumen != $filePath) {
                $changes['dokumen'] = [
                    'old' => $data->Dokumen,
                    'new' => $filePath
                ];
            }
        }

        $data->update($validated);

        $description = 'Updated Soal UAS: ' . $data->KodeSoal;
        if (!empty($changes)) {
            $description .= ' | Changes: ';
            foreach ($changes as $field => $change) {
                $description .= "$field: from '{$change['old']}' to '{$change['new']}', ";
            }
            $description = rtrim($description, ', ');
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' => $description
        ]);

        return response()->json(['data' => $data]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kbk = soalUas::find($id);
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
