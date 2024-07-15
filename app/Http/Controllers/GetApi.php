<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetApi extends Controller
{
    public function template(string $url)
    {
        $opts = array(
            'http' => array(
                'method' => "GET",
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);
        if ($result === false) {
            return response()->json([
                'status' => 200,
                'message' => 'Data not found'
            ]);
        } else {
            $data = json_decode($result, true); // true untuk mendapatkan array asosiatif
            if ($data === null) {
                echo 'Gagal mengurai JSON.';
            } else {
                // Mengambil data yang diinginkan
                $dataToSave = $data['list']; // Ganti 'data' dengan kunci yang sesuai
                return response()->json([
                    'status' => 200,
                    'data' => $dataToSave
                ]);
            }
        }
    }

    public function getMatkulKurikulum()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=matakuliah&file=kurikulum");
    }
    
    public function getMataKuliah()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=matakuliah&file=index");
    }
    public function getDosenMatkul()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=dosen&file=matakuliah");
    }
    public function getDosen()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=dosen&file=index");
    }
    public function getMahasiswaKelas()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=mahasiswa&file=kelas");
    }

    public function getJurusan()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=jurusan&file=jurusan");
    }

    public function getPimjur()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=jurusan&file=pimpinan");
    }

    public function getProdi()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=jurusan&file=prodi");
    }

    public function getPimprod()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=jurusan&file=kaprodi");
    }

    public function getSmt_thn_akd()
    {
        return $this->template("https://umkm-pnp.com/heni/index.php?folder=jurusan&file=thn_ta");
    }
    
    
}
