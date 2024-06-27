<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <input type="hidden" id="detailDataId">
                <table class="table table-striped table-bordered no-margin">
                    <tr>
                        <th>Kode Matkul:</th>
                        <td><span id="detailKodeMatkul"></span></td>
                    </tr>
                    <tr>
                        <th>Nama Matkul:</th>
                        <td><span id="detailNamaMatkul"></span></td>
                    </tr>
                    <tr>
                        <th>Prodi:</th>
                        <td><span id="detailProdi"></span></td>
                    </tr>
                    <tr>
                        <th>Semester:</th>
                        <td><span id="detailSemester"></span></td>
                    </tr>
                    <tr>
                        <th>T/P:</th>
                        <td><span id="detailTp"></span></td>
                    </tr>
                    <tr>
                        <th>KBK:</th>
                        <td><span id="detailKbk"></span></td>
                    </tr>
                    <tr>
                        <th>Jumlah SKS:</th>
                        <td><span id="detailJumlahSks"></span></td>
                    </tr>
                    <tr>
                        <th>Pengampu Matakuliah:</th>
                        <td><span id="detailPengampu"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
