<?php

namespace App\Http\Controllers;

use App\Models\RefKelas;
use Illuminate\Http\Request;

class RefKelasController extends Controller
{
   public function index(){
    $kelas = RefKelas::with('prodi','semester')->get();
    return view('dashboard.kelas.index', compact('kelas'));
   }

   public function show($id) {
      $data = RefKelas::with(['semester','prodi'])->where('id', $id)->get();
      return response()->json([
          'data' => $data,
          'status' => 200
      ]);
  }

  public function edit(string $id)
  {
      $data = RefKelas::find($id);
      return response()->json([
          'status' => 200,
          'data' => $data
      ]);
  }
}
