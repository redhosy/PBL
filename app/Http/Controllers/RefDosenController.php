<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_dosen;

use function PHPUnit\Framework\isEmpty;

class RefDosenController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_dos = ref_dosen::where('nama', 'like', '%' . $request->cari . '%')
                                ->orWhere('nip', 'like', '%' . $request->cari . '%')
                                ->get();
            $isEmpty=$data_dos->isEmpty();                    
        } else {
            $isEmpty=false;
            $data_dos = ref_dosen::all();
        }
        return view('dashboard.dados.index', compact('data_dos'));
    }    
}
