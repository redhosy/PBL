<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_jurusans;

class RefJurusanController extends Controller
{
    public function index(){
        $data_jur=ref_jurusans::latest()->paginate(5);
        return view('dashboard.dajur.index',compact('data_jur'));
    }

    public function show(string $id)
    {
        $data = ref_jurusans::find($id);
        return response()->json([
            'status' => 200,
            'data' => $data]);
    }

    public function edit(string $id)
    {
        $data = ref_jurusans::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data
        ]);
    }

}