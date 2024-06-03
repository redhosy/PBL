<?php

use App\Http\Controllers\matkulKBKController;
use App\Http\Controllers\RefDakurController;
use App\Http\Controllers\RefDamatkulController;
use App\Http\Controllers\RefDapinjurController;
use App\Http\Controllers\RefDapinprodController;
use App\Http\Controllers\RefDatakbkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefJurusanController;
use App\Http\Controllers\RefProdiController;
use App\Http\Controllers\RefDosenController;
use App\Http\Controllers\RefDosenkbkController;
use App\Http\Controllers\RefSmtThnAkdController;
use App\Http\Controllers\RegisterController;

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


Route::get('/dashboard',function(){
    return view('dashboard.index');
});

Route::get('/login',function(){
    return view('login');
});

Route::get('/team',function(){
    return view('team');
});

Route::get('/feature',function(){
    return view('feature');
});

Route::get('/about',function(){
    return view('about');
});


Route::get('/terms',function(){
    return view('terms');
});

Route::get('/register', [RegisterController::class,'register']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/dajur', [RefJurusanController::class,'index']);
Route::get('/dapro', [RefProdiController::class,'index']);
Route::get('/dados', [RefDosenController::class,'index']);
Route::get('/thnakad', [RefSmtThnAkdController::class,'index']);
Route::get('/dapinjur', [RefDapinjurController::class,'index']);
Route::get('/dapinprod', [RefDapinprodController::class,'index']);
Route::get('/dakur', [RefDakurController::class,'index']);
Route::get('/matkul', [RefDamatkulController::class,'index']);

Route::resource('datakbk', RefDatakbkController::class);
Route::resource('matkulkbk', matkulKBKController::class);





