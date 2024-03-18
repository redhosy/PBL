<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ref_jurusans;

class DashboardController extends Controller
{
    public function index(){
        $data_jur=ref_jurusans::all();
        return view('dashboard.dajur.index',compact('data_jur'));
    }
}