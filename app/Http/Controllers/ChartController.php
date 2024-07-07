<?php

// app/Http/Controllers/ChartController.php

namespace App\Http\Controllers;

use App\Models\ref_dakur;
use App\Models\ref_damatkul;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use App\Models\ref_smt_thn_akds;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Log;

class ChartController extends Controller
{
    // Endpoint API untuk mendapatkan data Bar Chart dalam format JSON
    public function getBarChartData()
    {
        try {
            // Menghitung jumlah entri untuk setiap model
            $data = [
                'jurusan' => ref_jurusans::count(),
                'prodi' => ref_prodis::count(),
                'mata_kuliah' => ref_damatkul::count(),
                'semester' => ref_smt_thn_akds::count(),
                'dakur' => ref_dakur::count(),
            ];

            // Mengembalikan data sebagai respons JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Logging error jika terjadi kesalahan
            Log::error('Error fetching bar chart data: '.$e->getMessage());

            // Mengembalikan respons JSON dengan kode status 500
            return response()->json([
                'error' => 'Error fetching bar chart data. Please try again later.',
            ], 500);
        }
    }

    // Endpoint API untuk mendapatkan data Pie Chart dalam format JSON
    public function getPieChartData()
    {
        try {
            // Menghitung jumlah entri untuk setiap model
            $data = [
                'jurusan' => ref_jurusans::count(),
                'prodi' => ref_prodis::count(),
                'mata_kuliah' => ref_damatkul::count(),
                'semester' => ref_smt_thn_akds::count(),
                'dakur' => ref_dakur::count(),
            ];

            // Mengembalikan data sebagai respons JSON
            return response()->json($data);
        } catch (\Exception $e) {
            // Logging error jika terjadi kesalahan
            Log::error('Error fetching pie chart data: '.$e->getMessage());

            // Mengembalikan respons JSON dengan kode status 500
            return response()->json([
                'error' => 'Error fetching pie chart data. Please try again later.',
            ], 500);
        }
    }

    // Menampilkan halaman Bar Chart dengan LarapexChart
    public function showBarChart()
    {
        try {
            // Menghitung jumlah entri untuk setiap model
            $counts = [
                ref_jurusans::count(),
                ref_prodis::count(),
                ref_damatkul::count(),
                ref_smt_thn_akds::count(),
                ref_dakur::count(),
            ];

            // Membuat instance LarapexChart untuk Bar Chart
            $barChart = (new LarapexChart())
                ->setType('bar')
                ->setTitle('Jumlah Data Akademik')
                ->setSubtitle('Distribusi Data di Sistem')
                ->setXAxis(['Jurusan', 'Prodi', 'Mata Kuliah', 'Semester', 'Daftar Kurikulum'])
                ->setDataset([
                    [
                        'name' => 'Jumlah',
                        'data' => $counts,
                    ],
                ]);

            // Mengirim data ke view
            return view('dashboard.barChart', compact('barChart'));
        } catch (\Exception $e) {
            // Logging error jika terjadi kesalahan
            Log::error('Error generating bar chart: '.$e->getMessage());

            // Mengembalikan halaman dengan pesan error
            return redirect()->back()->with('error', 'Error generating bar chart. Please try again later.');
        }
    }

    // Menampilkan halaman Pie Chart dengan LarapexChart
    public function showPieChart()
    {
        try {
            // Menghitung jumlah entri untuk setiap model
            $counts = [
                ref_jurusans::count(),
                ref_prodis::count(),
                ref_damatkul::count(),
                ref_smt_thn_akds::count(),
                ref_dakur::count(),
            ];

            // Membuat instance LarapexChart untuk Pie Chart
            $pieChart = (new LarapexChart())
                ->setType('pie')
                ->setTitle('Distribusi Data Akademik')
                ->setSubtitle('Persentase Data di Sistem')
                ->setLabels(['Jurusan', 'Prodi', 'Mata Kuliah', 'Semester', 'Daftar Kurikulum'])
                ->setDataset($counts);

            // Mengirim data ke view
            return view('dashboard.pieChart', compact('pieChart'));
        } catch (\Exception $e) {
            // Logging error jika terjadi kesalahan
            Log::error('Error generating pie chart: '.$e->getMessage());

            // Mengembalikan halaman dengan pesan error
            return redirect()->back()->with('error', 'Error generating pie chart. Please try again later.');
        }
    }
}
