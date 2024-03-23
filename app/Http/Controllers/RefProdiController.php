<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_prodis;

class RefProdiController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_pro = ref_prodis::where('prodi', 'like', '%' . $request->cari . '%')
            ->get();
        }else{
            $data_pro=ref_prodis::all();
        }
        return view('dashboard.dapro.index',compact('data_pro'));
    }
}
