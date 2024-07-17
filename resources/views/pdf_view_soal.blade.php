<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }

        .table-no-border th,
        .table-no-border td {
            border: none;
        }

        .section-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .signature {
            text-align: center;
            margin-top: 50px;
        }

        .signature div {
            display: inline-block;
            width: 200px;
        }

        .text-center {
            text-align: center;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table th,
        .header-table td {
            border: 1px solid #000;
            text-align: center;
            vertical-align: middle;
        }

        .logo-cell {
            width: 60px;
            padding: 0;
            border-right: none;
        }

        .text-cell {
            padding-left: 10px;
            border-left: none;
            font-size: 12px;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table header-table">
            <tr>
                <td class="logo-cell">
                    <img src="{{ $logo }}" alt="Logo" style="width: 60px; height: auto;">
                </td>
                <td class="text-cell" colspan="2">
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI <br>
                    POLITEKNIK NEGERI PADANG <br>
                    PUSAT PENINGKATAN DAN PENGEMBANGAN AKTIVITAS INSTRUKSIONAL (P3AI)
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center"><strong>FORMULIR</strong></td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    BERITA ACARA VERIFIKASI SOAL UAS<br>
                    JURUSAN : TEKNOLOGI INFORMASI<br>
                    PROGRAM STUDI : D4 Teknologi Rekayasa Perangkat Lunak
                </td>
            </tr>
        </table>

        <p>Telah dilaksanakan rapat verifikasi dan validasi soal ujian Akhir Semester bersama KBK dan Kaprodi yang dilaksanakan pada :</p>
        <div>
            <p><strong>Tanggal:</strong> {{ $dateRange }}</p>
            <p><strong>Tempat:</strong> {{ $ruang }}</p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Semester</th>
                    <th>Nama Matkul</th>
                    <th>Validasi Isi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->matkul->nama_matakuliah }}</td>
                        <td>{{ $item->validasi_isi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="signature">
            <div>
                <p>Menyetujui,<br>Ketua Program Studi<br><br><br>(......................................)</p>
            </div>
            <div>
                <p>Ketua KBK<br><br><br>(......................................)</p>
            </div>
        </div>

        <div class="text-center" style="margin-top: 50px;">
            <p>Mengetahui,<br>Ketua Jurusan<br><br><br>(......................................)</p>
        </div>
    </div>
</body>

</html>
