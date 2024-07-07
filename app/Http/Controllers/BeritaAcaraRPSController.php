<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\BeritaAcaraRPS;
use App\Models\ref_damatkul;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaAcaraRPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = ref_damatkul::all();
        $beritaRPS = BeritaAcaraRPS::with(['matakuliah'])->get();
        $tanggalList = BeritaAcaraRPS::select('tanggal')->distinct()->get();
        return view('dashboard.beritaRPS.index', compact('beritaRPS', 'matkul', 'tanggalList'));
    }

    public function cetakRPS(){
        
        $data = BeritaAcaraRPS::with('matakuliah')->where('tanggal', request('tanggal'))->get();
        if ($data->isEmpty()) {
            return response()->json(['status' => 404, 'message' => 'Data not found']);
        }

        // Ambil tanggal dan ruang dari salah satu item karena diasumsikan sama untuk semua item yang difilter
        $tanggal = $data->first()->tanggal;
        $ruang = $data->first()->ruang;

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'Cetak PDF',
            'description' => 'Cetak data berita acara RPS',
        ]);

        $pdf = FacadePdf::loadView('pdf_view_rps', compact('data', 'tanggal', 'ruang'));
        return $pdf->download('berita_acara_pdf.pdf');
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
        // Validasi input
        $validated = $request->validate([
            'semester' => 'required|integer|min:1|max:8',
            'matakuliah' => 'required|exists:ref_damatkuls,id', // pastikan matakuliah ada di database
            'evaluasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'ruang' => 'required|string|max:50',
        ]);

        // Simpan data ke database
        $data = new BeritaAcaraRPS();
        $data->semester = $validated['semester'];
        $data->id_matakuliah = $validated['matakuliah'];
        $data->evaluasi = $validated['evaluasi'];
        $data->tanggal = $validated['tanggal']; // nullable
        $data->ruang = $validated['ruang']; // nullable
        $data->save();

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'Menambahkan data baru: ' . $data->semester,
        ]);

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BeritaAcaraRPS::with('matakuliah')->find($id);
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
        $data = BeritaAcaraRPS::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'semester' => 'required|integer|min:1|max:8',
            'matakuliah' => 'required|exists:ref_damatkuls,id', // pastikan matakuliah ada di database
            'evaluasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'ruang' => 'required|string|max:50',
        ]);

        // Muat data dari database dan perbarui
        $data = BeritaAcaraRPS::findOrFail($id);
        $data->update($validated);

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' => 'Update data: ' . $data->id
        ]);

        // Kembalikan respons (redirect dengan pesan sukses)
        return response()->json(['status' => 'success', 'data' => $data]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kbk = BeritaAcaraRPS::find($id);
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
