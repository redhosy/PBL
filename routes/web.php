<?php

use App\Http\Controllers\activityController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\BeritaAcaraRPSController;
use App\Http\Controllers\BeritaAcaraSoalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GetApi;
use App\Http\Controllers\kaprodiController;
use App\Http\Controllers\matkulKBKController;
use App\Http\Controllers\RefDakurController;
use App\Http\Controllers\RefDamatkulController;
use App\Http\Controllers\RefDapinjurController;
use App\Http\Controllers\RefDapinprodController;
use App\Http\Controllers\RefDatakbkController;
use App\Http\Controllers\RefKelasController;
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
use App\Http\Controllers\profileController;
use App\Http\Controllers\Ref_matakuliahkbkController;
use App\Http\Controllers\RefDosenkbk;
use App\Http\Controllers\RefDosenMatkulController;
use App\Http\Controllers\RefMatkulkbk;
use App\Http\Controllers\UsersController;
use App\Models\ref_dosenkbk;

// use App\Models\ref_dosen;
// use App\Models\ref_jurusans;
// use App\Models\ref_matakuliahkbk;
// use App\Models\RefKelas;

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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'checkUserSession'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     // Tambahkan rute lain di sini
// });


// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');


Route::get('/team', function () {
    return view('team');
});

Route::get('/feature', function () {
    return view('feature');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/terms', function () {
    return view('terms');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

//backend

Route::group(["middleware" => "role:super admin"], function () {
    Route::resource('/activity', ActivityLogController::class);
    Route::resource('/pengguna', UsersController::class);
});

Route::middleware(['auth'])->group(function(){
    Route::group(["middleware" => "role:admin"], function () {
        Route::resource('/dajur', RefJurusanController::class);
        Route::resource('/dapro', RefProdiController::class);
        Route::resource('/dados', RefDosenController::class);
    
        Route::resource('/dosenkbk', RefDosenkbk::class);
        // exportexcel
        Route::get('dosenkbk/export/excel', [RefDosenkbk::class, 'dosenkbkExport'])->name('dosenkbk.export.excel');
        //importexcel
        Route::post('dosenkbk/import/excel', [RefDosenkbk::class, 'dosenkbkImport'])->name('dosenkbk.import.excel');
    
        Route::resource('/dosenmatkul', RefDosenMatkulController::class);

        Route::resource('/matkulkbk', Ref_matakuliahkbkController::class);
         // exportexcel
         Route::get('matkulkbk/export/excel', [Ref_matakuliahkbkController::class, 'matkulExport'])->name('matkulkbk.export.excel');
         //importexcel
         Route::post('matkulkbk/import/excel', [Ref_matakuliahkbkController::class, 'matkulImport'])->name('matkulkbk.import.excel');

        Route::resource('/matkul', RefDamatkulController::class);
        Route::get('/thnakad', [RefSmtThnAkdController::class, 'index']);
        Route::resource('/dapinjur', RefDapinjurController::class);
        Route::resource('/dapinprod', RefDapinprodController::class);
        Route::resource('/dakur', RefDakurController::class);
    
        Route::resource('/datakbk', RefDatakbkController::class);
        // exportexcel
        Route::get('datakbk/export/excel', [RefDatakbkController::class, 'datakbkExport'])->name('datakbk.export.excel');
        //importexcel
        Route::post('datakbk/import/excel', [RefDatakbkController::class, 'datakbkImport'])->name('datakbk.import.excel');
    });
});


Route::group(["middleware" => "role:dosen pengampu"], function () {
    Route::resource('/soalUas', SoalUasController::class);
    Route::resource('/RPS', RPSController::class);
    Route::resource('/dosenmatkul/pengampu', RefDosenMatkulController::class);
});

Route::group(["middleware" => "role:pengurus kbk"], function () {
    Route::resource('/verifikasiSoal', BeritaAcaraSoalController::class);
    // Route::resource('/soalUas', SoalUasController::class);
    Route::get('/verifikasiSoal/cetak', [BeritaAcaraSoalController::class, 'cetak'])->name('verifikasiSoal.cetak');
    Route::resource('/verifikasiRPS', BeritaAcaraRPSController::class);
    // Route::resource('/RPS', RPSController::class);
    Route::get('/verifikasiRPS/cetak', [BeritaAcaraRPSController::class, 'cetakBeritaAcara'])->name('verifikasiRPS.cetak');
});

Route::group(["middleware" => "role:pimpinan prodi"], function () {
    Route::resource('/kaprodi', kaprodiController::class);
});

// Route::group(["middleware" => "role:pimpinan jurusan"], function () {
//     Route::resource('/verifikasiSoal', BeritaAcaraSoalController::class);
//     Route::resource('/soalUas', SoalUasController::class);
//     Route::get('/verifikasiSoal/cetak', [BeritaAcaraSoalController::class, 'cetak'])->name('verifikasiSoal.cetak');
//     Route::resource('/verifikasiRPS', BeritaAcaraRPSController::class);
//     Route::resource('/RPS', RPSController::class);
//     Route::get('/verifikasiRPS/cetak', [BeritaAcaraRPSController::class, 'cetakBeritaAcara'])->name('verifikasiRPS.cetak');
// });



// Route::get('getMahasiswaProposal', [GetApi::class, 'getMahasiswaProposal']);
// Route::get('getMatkulKurikulum', [GetApi::class, 'getMatkulKurikulum']);
// Route::get('getMataKuliah', [GetApi::class, 'getMataKuliah']);
// Route::get('getDosenMatkul', [GetApi::class, 'getDosenMatkul']);
// Route::get('getDosen', [GetApi::class, 'getDosen']);
// Route::get('getMahasiswaKelas', [GetApi::class, 'getMahasiswaKelas']);
// Route::get('getMahasiswa', [GetApi::class, 'getMahasiswa']);

Route::resource('/dashboard/dosen', RefDosenController::class)->middleware('auth');
Route::resource('/profile', profileController::class);

// Route::resource('/dashboard/pengguna', UsersController::class)->except('show')->middleware('role:super-admin');







Route::get('test', function () {
    $data = ref_dosenkbk::with(['dosen', 'prodi', 'jurusan', 'kbk'])->get();

    dd($data);
});
