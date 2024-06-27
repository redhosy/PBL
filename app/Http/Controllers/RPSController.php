<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\RPS;
use Illuminate\Http\Request;
=======
use App\Models\ActivityLog;
use App\Models\ref_smt_thn_akds;
use App\Models\ref_damatkul;
use App\Models\ref_dosen;
use App\Models\RPS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
>>>>>>> Stashed changes

class RPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
<<<<<<< Updated upstream
        return view('dashboard.RPS.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
=======
        // echo 'tt';
        $dosen = ref_dosen::all();
        $thnakd = ref_smt_thn_akds::all();
        $damatkul = ref_damatkul::all();
        $rps = RPS::with('kode_matkul', 'thnakd', 'dosen')->get();
        return view('dashboard.RPS.index', compact('rps', 'dosen', 'thnakd', 'damatkul'));
        // dd($matkulkbk);
>>>>>>> Stashed changes
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< Updated upstream
        //
=======
        $validated = $request->validate([
            'koderps' => 'required|string|max:10',
            'dosen_pengembang' => 'required|exists:ref_dosens,id',
            'kode_matkul' => 'required|exists:ref_damatkuls,id',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'tanggal' => 'required|date',
            'thnakd' => 'required|exists:ref_smt_thn_akds,id',
        ]);

        $data = new RPS();
        $data->KodeRPS = $validated['koderps'];
        $data->id_dosen = $validated['dosen_pengembang'];
        $data->id_KodeMatkul = $validated['kode_matkul'];
        $data->Tanggal = $validated['tanggal'];
        $data->id_smt_thn_akd = $validated['thnakd'];

        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen_rps', 'public');
        }

        // Simpan data ke database
        $rps = RPS::create($validated);


        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data RPS baru: ' . $data->KodeRPS,
        ]);

        return response()->json(['data' => $rps]);
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = RPS::with('dosen', 'kode_matkul', 'thnakd')->where('id', $id)->get();
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
        $data = RPS::find($id);
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
            'koderps' => 'required|string|max:10',
            'dosen_pengembang' => 'required|exists:ref_dosens,id',
            'kode_matkul' => 'required|exists:ref_damatkuls,id',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
            'tanggal' => 'required|date',
            'thnakd' => 'required|exists:ref_smt_thn_akds,id',
        ]);

        $RPS = RPS::findOrFail($id);

        $changes = [];
        foreach ($validated as $key => $value) {
            if ($RPS[$key] != $value) {
                $changes[$key] = [
                    'old' => $RPS[$key],
                    'new' => $value
                ];
            }
        }

        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $filePath = $file->store('dokumen', 'public'); // Menyimpan file di direktori storage/app/public/dokumen
            $validated['dokumen'] = $filePath;

            if ($RPS->Dokumen != $filePath) {
                $changes['dokumen'] = [
                    'old' => $RPS->Dokumen,
                    'new' => $filePath
                ];
            }
        }

        $RPS->update($validated);

        $description = 'Updated RPS: ' . $RPS->KodeRPS;
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

        return response()->json(['data' => $RPS]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $kbk = RPS::find($id);
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
