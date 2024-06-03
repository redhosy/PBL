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
                    <input type="hidden" id="editDataId" name="id">
                    <div class="form-group">
                        <label for="editKodeMatkul">Kode KBK:</label>
                        <input type="text" class="form-control" id="editKodeMatkul" name="KodeMatkul" required>
                    </div>
                    <div class="form-group">
                        <label for="editNama">Nama:</label>
                        <input type="text" class="form-control" id="editNama" name="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="editJumlahsks">Jumlah SKS:</label>
                        <textarea class="form-control" id="editJumlahsks" name="Jumlahsks" required></textarea>
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