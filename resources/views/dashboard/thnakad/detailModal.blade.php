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
                <input type="hidden" id="editDataId">
                <table class="table table-striped table-bordered no-margin">
                    <tr>
                        <th>Semester Tahun Akademik :</th>
                        <td><span id="detailsemta"></span></td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td><span id="detailstatus"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
