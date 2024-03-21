<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_dosen;

class RefDosenController extends Controller
{
    public function index(){
        $data_dos=ref_dosen::all();
        return view('dashboard.dados.index',compact('data_dos'));
    }
}
