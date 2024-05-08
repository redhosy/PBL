<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_prodis;

use function Pest\Laravel\get;

class RefProdiController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_pro = ref_prodis::where('prodi', 'like', '%' . $request->cari . '%')
            ->get();
        }else{
            $data_pro=ref_prodis::with('jurusan')->paginate(5);
        }
        return view('dashboard.dapro.index',compact('data_pro'));
    }
}
