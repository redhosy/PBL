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
                <input type="hidden" id="detailDataId" name="id">
                <table class="table table-striped table-bordered no-margin">
                    <tr>
                        <th>Nama :</th>
                        <td><span id="detailnama"></span></td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td><span id="detailemail"></span></td>
                    </tr>
                    <tr>
                        <th>Role :</th>
                        <td><span id="detailrole"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
