<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editDataForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editjabpim">Jabatan Pimpinan:</label>
                        <input type="text" class="form-control" id="editjabpim" name="editjabpim" required>
                    </div>
                    <div class="form-group">
                        <label for="editnama">Nama:</label>
                        <input type="text" class="form-control" id="editnama" name="editnama" required>
                    </div>
                    <div class="form-group">
                        <label for="editprodi">Prodi:</label>
                        <input type="text" class="form-control" id="editprodi" name="editprodi" required>
                    </div>
                    <div class="form-group">
                        <label for="editperiode">Periode:</label>
                        <input type="text" class="form-control" id="editperiode" name="editperiode" required>
                    </div>
                    <div class="form-group">
                        <label for="editstatus">Status</label>
                        <select class="form-control" id="editstatus" name="editstatus">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
