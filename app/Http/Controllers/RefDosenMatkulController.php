<?php

namespace App\Http\Controllers;

use App\Models\RefDosenMatkul;
use Illuminate\Http\Request;

class RefDosenMatkulController extends Controller
{
    public function index(){
        $dosenmatkul = RefDosenMatkul::with(['dosen','kelas','semester','matakuliah'])->get();
        return view('dashboard.dosenmatkul.index', compact('dosenmatkul'));
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
