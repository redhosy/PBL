<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\BeritaAcaraRPSController;
use App\Http\Controllers\BeritaAcaraSoalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\Ref_matakuliahkbkController;
use App\Http\Controllers\RefDakurController;
use App\Http\Controllers\RefDamatkulController;
use App\Http\Controllers\RefDapinjurController;
use App\Http\Controllers\RefDapinprodController;
use App\Http\Controllers\RefDatakbkController;
use App\Http\Controllers\RefDosenController;
use App\Http\Controllers\RefDosenkbk;
use App\Http\Controllers\RefDosenMatkulController;
use App\Http\Controllers\RefJurusanController;
use App\Http\Controllers\RefProdiController;
use App\Http\Controllers\RefSmtThnAkdController;
use App\Http\Controllers\RPSController;
use App\Http\Controllers\SoalUasController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'checkUserSession'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/barChartData', [DashboardController::class, 'getBarChartData'])
        ->middleware('role:admin|pengurus kbk|pimpinan jurusan|pimpinan program studi|dosen-pengampu')
        ->name('dashboard.barChartData');

    Route::get('/dashboard/pieChartData', [DashboardController::class, 'getPieChartData'])
        ->middleware('role:admin|pengurus kbk|pimpinan jurusan|pimpinan program studi|dosen-pengampu')
        ->name('dashboard.pieChartData');
});
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
Route::get('/forgotPassword', [forgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgotPassword', [forgotPasswordController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [forgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [forgotPasswordController::class, 'resetPassword'])->name('password.update');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'role:super admin'], function () {
    Route::resource('/activity', ActivityLogController::class);
    Route::resource('/pengguna', UsersController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => 'role:admin'], function () {
        Route::resource('/dajur', RefJurusanController::class);
        Route::resource('/dapro', RefProdiController::class);
        Route::resource('/dados', RefDosenController::class);
        Route::resource('/dosenkbk', RefDosenkbk::class);
        Route::get('dosenkbk/export/excel', [RefDosenkbk::class, 'dosenkbkExport'])->name('dosenkbk.export.excel');
        Route::post('dosenkbk/import/excel', [RefDosenkbk::class, 'dosenkbkImport'])->name('dosenkbk.import.excel');
        Route::resource('/matkulkbk', Ref_matakuliahkbkController::class);
        Route::get('matkulkbk/export/excel', [Ref_matakuliahkbkController::class, 'matkulExport'])->name('matkulkbk.export.excel');
        Route::post('matkulkbk/import/excel', [Ref_matakuliahkbkController::class, 'matkulImport'])->name('matkulkbk.import.excel');
        Route::get('/thnakad', [RefSmtThnAkdController::class, 'index']);
        Route::get('/thnakad/{id}', [RefSmtThnAkdController::class, 'show']);
        Route::resource('/dapinjur', RefDapinjurController::class);
        Route::resource('/dapinprod', RefDapinprodController::class);
        Route::resource('/dakur', RefDakurController::class);
        Route::resource('/datakbk', RefDatakbkController::class);
        Route::get('datakbk/export/excel', [RefDatakbkController::class, 'datakbkExport'])->name('datakbk.export.excel');
        Route::post('datakbk/import/excel', [RefDatakbkController::class, 'datakbkImport'])->name('datakbk.import.excel');
    });

    Route::group(['middleware' => 'role:dosen pengampu'], function () {
        Route::resource('/soalUas', SoalUasController::class);
        Route::resource('/RPS', RPSController::class);
    });

    Route::group(['middleware' => ['can:access-admin-routes']], function () {
        Route::resource('/dosenmatkul', RefDosenMatkulController::class);
        Route::get('dosenmatkul/export/excel', [RefDosenMatkulController::class, 'dosenMatkulExport'])->name('dosenmatkul.export.excel');
        Route::resource('/matkul', RefDamatkulController::class);
    });

    Route::group(['middleware' => 'role:pengurus kbk'], function () {
        Route::resource('/verifikasiSoal', BeritaAcaraSoalController::class);
        Route::resource('/verifikasiRPS', BeritaAcaraRPSController::class);
        Route::get('/cetakRPS', [BeritaAcaraRPSController::class, 'cetakRPS']);
        Route::get('/cetakSOAL', [BeritaAcaraSoalController::class, 'cetakSOAL']);
    });

    Route::group(['middleware' => ['can:access-dosen-routes']], function () {
        Route::resource('/soalUas', SoalUasController::class);
        Route::resource('/RPS', RPSController::class);
    });

    Route::group(['middleware' => ['can:access-petinggi-routes']], function () {
        Route::resource('/verifikasiSoal', BeritaAcaraSoalController::class);
        Route::resource('/verifikasiRPS', BeritaAcaraRPSController::class);
        Route::get('/cetakRPS', [BeritaAcaraRPSController::class, 'cetakRPS']);
        Route::get('/cetakSOAL', [BeritaAcaraSoalController::class, 'cetakSOAL']);
        Route::resource('/soalUas', SoalUasController::class);
        Route::resource('/RPS', RPSController::class);
    });
});

Route::resource('/dashboard/dosen', RefDosenController::class)->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [profileController::class, 'update'])->name('profile.update');
    Route::post('/profile/reset-password', [profileController::class, 'resetPassword'])->name('profile.reset-password');
});
