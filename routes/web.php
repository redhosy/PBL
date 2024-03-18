<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RefProdiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('home');
});

Route::get('/tentang',function(){
    return view('tentang');
});


Route::get('/dashboard',function(){
    return view('dashboard.index');
});

Route::get('/dajur', [DashboardController::class,'index']);
Route::get('/dapro', [RefProdiController::class,'index']);
