<?php

use App\Http\Controllers\RefDakurController;
use App\Http\Controllers\RefDamatkulController;
use App\Http\Controllers\RefDapinjurController;
use App\Http\Controllers\RefDapinprodController;
use App\Http\Controllers\RefDatakbkController;
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

Route::get('/login',function(){
    return view('login');
});

Route::get('/register',function(){
    return view('register');
    });

Route::get('/dajur', [RefJurusanController::class,'index']);
Route::get('/dapro', [RefProdiController::class,'index']);
Route::get('/dados', [RefDosenController::class,'index']);
Route::get('/thnakad', [RefSmtThnAkdController::class,'index']);
Route::get('/dapinjur', [RefDapinjurController::class,'index']);
Route::get('/dapinprod', [RefDapinprodController::class,'index']);
Route::get('/dakur', [RefDakurController::class,'index']);
Route::get('/matkul', [RefDamatkulController::class,'index']);

Route::get('/datakbk', [RefDatakbkController::class,'index']);
Route::get('/datakbk/create', [RefDatakbkController::class, 'create']);
Route::post('/datakbk', [RefDatakbkController::class, 'store'])->name('datakbk.store');
Route::delete('/datakbk/{id}', [RefDatakbkController::class, 'destroy'])->name('datakbk.destroy');



