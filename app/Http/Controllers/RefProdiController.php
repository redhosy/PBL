<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_prodis;

use function Pest\Laravel\get;

class RefProdiController extends Controller
{
    public function index(){
        $data_pro=ref_prodis::latest()->paginate(10);
        return view('dashboard.dapro.index',compact('data_pro'));
    }  

    public function show($id) {
        $data = ref_prodis::with(['jurusan'])->find($id);
        return response()->json([
            'data' => $data,
            'status' => 200
        ]);
    }

    public function edit(string $id)
    {
        $data = ref_prodis::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }
}
