<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_prodis;

class RefProdiController extends Controller
{
    public function index(){
        $data_pro=ref_prodis::all();
        return view('dashboard.dapro.index',compact('data_pro'));
    }
}
