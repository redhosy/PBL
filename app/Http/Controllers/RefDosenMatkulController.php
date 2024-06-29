<?php

namespace App\Http\Controllers;

use App\Exports\dosenMatkulExport;
use App\Models\ActivityLog;
use App\Models\RefDosenMatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RefDosenMatkulController extends Controller
{
    public function index(){
        $dosenmatkul = RefDosenMatkul::with(['dosen','kelas','semester','matakuliah'])->get();
        return view('dashboard.dosenmatkul.index', compact('dosenmatkul'));
    }

    public function dosenMatkulExport(){

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'EXPORT',
            'description' => 'Mengekspor data dari file Excel',
        ]);

        return Excel::download(new dosenMatkulExport, 'data_dosen_matkul.xlsx');
    }

    public function show($id) {
        $data = RefDosenMatkul::with(['dosen','kelas','semester', 'matakuliah'])->where('id', $id)->get();
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = RefDosenMatkul::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
