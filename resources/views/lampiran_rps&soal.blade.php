<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .signature {
            text-align: center;
            margin-top: 50px;
        }

        .signature div {
            display: inline-block;
            width: 200px;
        }

        .container {
            width: 100%;
            border-collapse: collapse;
        }

        .container th,
        .container td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="container">
            <tr>
                <th rowspan="1" width="20%"><img src="#" alt="Logo Politeknik"
                        width="100"></th>
                <th colspan="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN TEKNOLOGI <br>POLITEKNIK NEGERI
                    PADANG <br> PUSAT PENINGKATAN DAN PENGEMBANGAN AKTIVITAS INSTRUKSIONAL (P3AI) </th>
            </tr>
            <tr>
                <td colspan="3">FORMULIR</td>
            </tr>
            <tr>
                <td colspan="2">VERIFIKASI SOAL UJIAN AKHIR SEMESTER <br> JURUSAN : TEKNOLOGI INFORMASI<br>PROGRAM
                    STUDI : D4 Teknologi Rekayasa Perangkat Lunak</td>
            </tr>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Semester</th>
                    <th>Nama Matkul</th>
                    <th>Evaluasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                        <td>{{ $item->evaluasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br><br>
        <div class="signature">
            <div>
                <p>Menyetujui,<br>Ketua Program Studi<br><br><br><br>(......................................)</p>
            </div>
            <div>
                <p>Ketua KBK<br><br><br><br>(......................................)</p>
            </div>
        </div>
        <div class="text-center" style="margin-top: 50px;">
            <p>Mengetahui,<br>Ketua Jurusan<br><br><br><br>(......................................)</p>
        </div>
    </div>
</body>

</html>
