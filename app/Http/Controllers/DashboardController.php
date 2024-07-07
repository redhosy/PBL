<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcaraRPS;
use App\Models\BeritaAcaraSoal;
use App\Models\ref_dakur;
use App\Models\ref_damatkul;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use App\Models\ref_smt_thn_akds;
use App\Models\RPS;
use App\Models\soalUas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Sesi Anda telah kedaluwarsa. Silakan login kembali.');
        }

        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Sesi Anda telah kedaluwarsa. Silakan login kembali.');
        }

        return view('dashboard.index', compact('user'));
    }

    // Metode untuk mendapatkan data Bar Chart berdasarkan peran pengguna
    public function getBarChartData()
    {
        try {
            $user = Auth::user();

            $data = [];
            switch ($user->role) {
                case 'admin':
                    $data = [
                        'jurusan' => ref_jurusans::count(),
                        'prodi' => ref_prodis::count(),
                        'mata_kuliah' => ref_damatkul::count(),
                        'semester' => ref_smt_thn_akds::count(),
                        'dakur' => ref_dakur::count(),
                    ];
                    break;

                case 'pengurus kbk':
                case 'pimpinan jurusan':
                case 'pimpinan program studi':
                    $data = [
                        'rps' => RPS::count(),
                        'soaluas' => soalUas::count(),
                        'beritarps' => BeritaAcaraRPS::count(),
                        'beritasoal' => BeritaAcaraSoal::count(),
                    ];
                    break;

                case 'dosen-pengampu':
                    $data = [
                        'mata_kuliah' => ref_damatkul::where('dosen_id', $user->id)->count(),
                    ];
                    break;

                default:
                    return response()->json([
                        'error' => 'Role tidak valid.',
                    ], 403);
            }

            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Error fetching bar chart data: '.$e->getMessage());

            return response()->json([
                'error' => 'Error fetching bar chart data. Please try again later.',
            ], 500);
        }
    }

    // Metode untuk mendapatkan data Pie Chart berdasarkan peran pengguna
    public function getPieChartData()
    {
        try {
            $user = Auth::user();

            $data = [];
            switch ($user->role) {
                case 'admin':
                    $data = [
                        'jurusan' => ref_jurusans::count(),
                        'prodi' => ref_prodis::count(),
                        'mata_kuliah' => ref_damatkul::count(),
                        'semester' => ref_smt_thn_akds::count(),
                        'dakur' => ref_dakur::count(),
                    ];
                    break;

                case 'pengurus kbk':
                case 'pimpinan jurusan':
                case 'pimpinan program studi':
                    $data = [
                        'rps' => RPS::count(),
                        'soaluas' => soalUas::count(),
                        'beritarps' => BeritaAcaraRPS::count(),
                        'beritasoal' => BeritaAcaraSoal::count(),
                    ];
                    break;

                case 'dosen-pengampu':
                    $data = [
                        'mata_kuliah' => ref_damatkul::where('dosen_id', $user->id)->count(),
                    ];
                    break;

                default:
                    return response()->json([
                        'error' => 'Role tidak valid.',
                    ], 403);
            }

            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Error fetching pie chart data: '.$e->getMessage());

            return response()->json([
                'error' => 'Error fetching pie chart data. Please try again later.',
            ], 500);
        }
    }
}
