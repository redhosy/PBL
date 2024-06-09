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
                        <th>Semester Tahun Akademik :</th>
                        <td><span id="detailsemta"></span></td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td><span id="detailstatus"
                            class="badge rounded-pill {{ $item->status ? 'bg-danger text-white' : 'bg-success text-white' }} py-2 px-4">
                            {{ $item->status ? 'Tidak Aktif' : ' Aktif' }}
                        </span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
