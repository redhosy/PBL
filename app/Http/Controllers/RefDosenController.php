<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_dosen;

use function PHPUnit\Framework\isEmpty;

class RefDosenController extends Controller
{
    public function index(){
        $data_dos=ref_dosen::latest()->paginate(10);
        return view('dashboard.dados.index',compact('data_dos'));
    }    

    public function show($id) {
        $data = ref_dosen::with(['prodi', 'jurusan'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = ref_dosen::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }
}
