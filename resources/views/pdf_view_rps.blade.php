<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
        .signature { text-align: center; margin-top: 50px; }
        .signature div { display: inline-block; width: 200px; }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="text-center">BERITA ACARA VERIFIKASI RPS<br>RENCANA PEMEBELAJARAN SEMESTER<br>PROGRAM STUDI TEKNOLOGI REKAYASA PERANGKAT LUNAK</h4>
        <p>Telah dilaksanakan rapat Peninjauan materi RPS besama KBK dan Kaprodi yang
            dilaksanakan pada:</p>
        <p>Tanggal: {{ $tanggal }} <br>Tempat: {{ $ruang }} </p>
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
                @foreach($data as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                        <td>{{ $item->evaluasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
