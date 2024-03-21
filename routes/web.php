<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefJurusanController;
use App\Http\Controllers\RefProdiController;
use App\Http\Controllers\RefDosenController;
use App\Http\Controllers\RefSmtThnAkdController;

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

Route::get('/dajur', [RefJurusanController::class,'index']);
Route::get('/dapro', [RefProdiController::class,'index']);
Route::get('/dados', [RefDosenController::class,'index']);
Route::get('/thnakad', [RefSmtThnAkdController::class,'index']);
