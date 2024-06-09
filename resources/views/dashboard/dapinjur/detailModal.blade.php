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
                <table class="table table-striped table-bordered no-margin">
                    <tr>
                        <th>Jabatan Pimpinan :</th>
                        <td><span id="detailjabatan"></span></td>
                    </tr>
                    <tr>
                        <th>Nama:</th>
                        <td><span id="detailnama"></span></td>
                    </tr>
                    <tr>
                        <th>Jurusan :</th>
                        <td><span id="detailjurusan"></span></td>
                    </tr>
                    <tr>
                        <th>Periode :</th>
                        <td><span id="detailperiode"></span></td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td><span class="badge rounded-pill {{ $item->status ? 'bg-success  text-white' : 'bg-danger text-white' }} py-2 px-4">
                            {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                        </span>   
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
