<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\BeritaAcaraRPSController;
use App\Http\Controllers\BeritaAcaraSoalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\GetApi;
use App\Http\Controllers\Landingpage;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
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
use App\Http\Controllers\verifikasiRPS;
use App\Http\Controllers\verifikasiSoal;
use App\Models\ref_dakur;
use App\Models\ref_damatkul;
use App\Models\ref_dapinjurs;
use App\Models\ref_dapinprod;
use App\Models\ref_dosen;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use App\Models\ref_smt_thn_akds;
use App\Models\RefDosenMatkul;
use App\Models\RefKelas;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'checkUserSession'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/barChartData', [DashboardController::class, 'getBarChartData'])
        ->middleware('role:super admin|admin|pengurus kbk|pimpinan jurusan|pimpinan program studi|dosen pengampu')
        ->name('dashboard.barChartData');

    Route::get('/dashboard/pieChartData', [DashboardController::class, 'getPieChartData'])
        ->middleware('role:admin|pengurus kbk|pimpinan jurusan|pimpinan program studi|dosen pengampu')
        ->name('dashboard.pieChartData');
});
Route::get('/team', function () {
    return view('team');
});

Route::get('/feature', [Landingpage::class, 'index'])->name('feature.index');

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
        Route::post('/rps/approve', [RPSController::class, 'approve'])->name('rps.approve');
        Route::post('/soal/approve', [SoalUasController::class, 'approve'])->name('soal.approve');
    });

    Route::group(['middleware' => ['can:access-dosen-routes']], function () {
        Route::resource('/soalUas', SoalUasController::class);
        Route::resource('/RPS', RPSController::class);
    });

    Route::group(['middleware' => ['can:access-petinggi-routes']], function () {
        Route::resource('/verifikasiSoal', verifikasiSoal::class);
        Route::resource('/verifikasiRPS', verifikasiRPS::class);
        Route::resource('/beritaSoal', BeritaAcaraSoalController::class);
        Route::resource('/beritaRPS', BeritaAcaraRPSController::class);
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

Route::get('/notifications', [NotificationController::class, 'index']);
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead']);

Route::get('buttonApi', function () {
    return view('buttonApi');
});

Route::get('/fetchingJurusan', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=jurusan&file=jurusan');
    if ($response->successful()) {
        $JurusanList = $response->json();
        for ($i = 0; $i < count($JurusanList['list']); ++$i) {
            ref_jurusans::updateOrCreate([
                'kode_jurusan' => $JurusanList['list'][$i]['kode_jurusan'],
                'jurusan' => $JurusanList['list'][$i]['jurusan'],
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingProdi', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=jurusan&file=prodi');
    if ($response->successful()) {
        $ProdiList = $response->json();
        for ($i = 0; $i < count($ProdiList['list']); ++$i) {
            ref_prodis::updateOrCreate([
                'kode_prodi' => $ProdiList['list'][$i]['kode_prodi'],
                'prodi' => $ProdiList['list'][$i]['prodi'],
                'id_jurusan' => $ProdiList['list'][$i]['id_jurusan'],
                'id_jenjang' => $ProdiList['list'][$i]['id_jenjang'],
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingKurikulum', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=matakuliah&file=kurikulum');
    if ($response->successful()) {
        $DosenMatkulList = $response->json();
        for ($i = 0; $i < count($DosenMatkulList['list']); ++$i) {
            ref_dakur::updateOrCreate([
                'kode_kurikulum' => $DosenMatkulList['list'][$i]['kode_kurikulum'],
                'nama_kurikulum' => $DosenMatkulList['list'][$i]['nama_kurikulum'],
                'tahun' => $DosenMatkulList['list'][$i]['tahun'],
                'id_prodi' => $DosenMatkulList['list'][$i]['id_prodi'],
                'status' => $DosenMatkulList['list'][$i]['status'],
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingSmt_thn_akd', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=jurusan&file=thn_ta');
    if ($response->successful()) {
        $Smt_thn_akdList = $response->json();
        for ($i = 0; $i < count($Smt_thn_akdList['list']); ++$i) {
            ref_smt_thn_akds::updateOrCreate([
                'smt_thn_akd' => $Smt_thn_akdList['list'][$i]['smt_thn_akd'],
                'status' => $Smt_thn_akdList['list'][$i]['status'],
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('fetchingMatakuliah', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=matakuliah&file=index');
    if ($response->successful()) {
        $matakuliahList = $response->json();
        for ($i = 0; $i < count($matakuliahList['list']); ++$i) {
            ref_damatkul::updateOrCreate([
                'kode_matakuliah' => $matakuliahList['list'][$i]['kode_matakuliah'],
                'nama_matakuliah' => $matakuliahList['list'][$i]['nama_matakuliah'],
                'TP' => $matakuliahList['list'][$i]['TP'],
                'sks' => $matakuliahList['list'][$i]['sks'],
                'jam' => $matakuliahList['list'][$i]['jam'],
                'sks_teori' => $matakuliahList['list'][$i]['sks_teori'],
                'sks_praktek' => $matakuliahList['list'][$i]['sks_praktek'],
                'jam_teori' => $matakuliahList['list'][$i]['jam_teori'],
                'jam_praktek' => $matakuliahList['list'][$i]['jam_praktek'],
                'semester' => $matakuliahList['list'][$i]['semester'],
                'id_kurikulum' => $matakuliahList['list'][$i]['id_kurikulum'],
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingDosen', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=dosen&file=index');
    if ($response->successful()) {
        $DosenList = $response->json();
        for ($i = 0; $i < count($DosenList['list']); ++$i) {
            $idjurusan = ref_jurusans::where('jurusan', $DosenList['list'][$i]['jurusan'])->first();
            $idprodi = ref_prodis::where('prodi', $DosenList['list'][$i]['prodi'])->first();
            ref_dosen::updateOrCreate([
                'nama' => $DosenList['list'][$i]['nama'],
                'nidn' => $DosenList['list'][$i]['nidn'],
                'nip' => $DosenList['list'][$i]['nip'],
                'gender' => $DosenList['list'][$i]['gender'] == 'Laki-laki' ? 1 : 0,
                'id_jurusan' => $idjurusan->id,
                'id_prodi' => $idprodi->id,
                'email' => $DosenList['list'][$i]['email'],
                'status' => 1,
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingKelas', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=mahasiswa&file=kelas');
    if ($response->successful()) {
        $KelasList = $response->json();
        for ($i = 0; $i < count($KelasList['list']); ++$i) {
            $idprodi = ref_prodis::where('prodi', $KelasList['list'][$i]['prodi'])->first();
            $idSmt = ref_smt_thn_akds::where('smt_thn_akd', $KelasList['list'][$i]['smt_thn_akd'])->first();

            RefKelas::updateOrCreate([
                'kode_kelas' => $KelasList['list'][$i]['kode_kelas'],
                'nama_kelas' => $KelasList['list'][$i]['nama_kelas'],
                'id_prodi' => $idprodi->id,
                'id_smt_thn_akd' => $idSmt->id,
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingDosenMatkul', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=dosen&file=matakuliah');
    if ($response->successful()) {
        $DosenMatkulList = $response->json();
        for ($i = 0; $i < count($DosenMatkulList['list']); ++$i) {
            $idDosen = ref_dosen::where('nama', $DosenMatkulList['list'][$i]['nama'])->first();
            $idMatkul = ref_damatkul::where('kode_matakuliah', $DosenMatkulList['list'][$i]['kode_matakuliah'])->first();
            $idKelas = RefKelas::where('kode_kelas', $DosenMatkulList['list'][$i]['kode_kelas'])->first();
            $idSmt = ref_smt_thn_akds::where('smt_thn_akd', $DosenMatkulList['list'][$i]['smt_thn_akd'])->first();
            RefDosenMatkul::updateOrCreate([
                'id_matakuliah' => $idMatkul->id,
                'id_dosen' => $idDosen->id,
                'id_kelas' => $idKelas->id,
                'id_smt_thn_akd' => $idSmt->id,
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingPimJur', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=jurusan&file=pimpinan');
    if ($response->successful()) {
        $PimJurList = $response->json();
        for ($i = 0; $i < count($PimJurList['list']); ++$i) {
            $idjurusan = ref_jurusans::where('jurusan', $PimJurList['list'][$i]['jurusan'])->first();
            $idDosen = ref_dosen::where('nama', $PimJurList['list'][$i]['nama'])->first();
            ref_dapinjurs::updateOrCreate([
                'id_jabatan_pimpinan' => $PimJurList['list'][$i]['kode_jabatan_pimpinan'],
                'id_jurusan' => $idjurusan->id,
                'id_dosen' => $idDosen->id,
                'periode' => $PimJurList['list'][$i]['periode'],
                'status' => 1,
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('/fetchingPimProd', function () {
    $cekSukses = false;
    $response = Http::get('https://umkm-pnp.com/heni/index.php?folder=jurusan&file=kaprodi');
    if ($response->successful()) {
        $PimJurList = $response->json();
        for ($i = 0; $i < count($PimJurList['list']); ++$i) {
            $idJabatan = ref_dapinjurs::where('kode_jabatan_pimpinan', $PimJurList['list'][$i]['kode_jabatan_pimpinan'])->first();
            ref_dapinprod::updateOrCreate([
                'id_jabatan_pimpinan' => $idJabatan->id,
                'id_jurusan' => $PimJurList['list'][$i]['id_jurusan'],
                'id_dosen' => $PimJurList['list'][$i]['id_dosen'],
                'periode' => $PimJurList['list'][$i]['periode'],
                'status' => 1,
            ]);
            $cekSukses = true;
        }
    }

    return $cekSukses ? Response()->json(['status' => 200, 'message' => 'Berhasil mengambil data dari api']) : Response()->json(['status' => 400, 'message' => 'Gagal mengambil data dari api']);
});

Route::get('getMatkulKurikulum', [GetApi::class, 'getMatkulKurikulum']);
Route::get('getMataKuliah', [GetApi::class, 'getMataKuliah']);
Route::get('getDosenMatkul', [GetApi::class, 'getDosenMatkul']);
Route::get('getDosen', [GetApi::class, 'getDosen']);
Route::get('getMahasiswaKelas', [GetApi::class, 'getMahasiswaKelas']);
Route::get('getJurusan', [GetApi::class, 'getJurusan']);
Route::get('getPimjur', [GetApi::class, 'getPimjur']);
Route::get('getProdi', [GetApi::class, 'getProdi']);
Route::get('getPimprod', [GetApi::class, 'getPimprod']);
Route::get('getSmt_thn_akd', [GetApi::class, 'getSmt_thn_akd']);
