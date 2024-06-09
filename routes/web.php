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

use App\Http\Controllers\RPSController;
use App\Http\Controllers\SoalUasController;

use App\Http\Controllers\LoginController;


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


Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// Route::resource('/dashboard',dasboard::class)->middleware('admin');

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::resource('/dajur',RefJurusanController::class);
Route::resource('/dapro', RefProdiController::class);
Route::resource('/dados', RefDosenController::class);
Route::resource('/matkul', RefDamatkulController::class);
Route::get('/thnakad', [RefSmtThnAkdController::class,'index']);
Route::resource('/dapinjur', RefDapinjurController::class);
Route::get('/dapinprod', [RefDapinprodController::class,'index']);
Route::resource('/dakur', RefDakurController::class);

Route::resource('datakbk', RefDatakbkController::class);
Route::resource('matkulkbk', matkulKBKController::class);
Route::resource('dosenkbk', RefDosenkbkController::class);
Route::resource('soalUas', SoalUasController::class);
Route::resource('RPS', RPSController::class);





