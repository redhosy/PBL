<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addPostForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kodejurusan">Kode Jurusan:</label>
                        <input type="text" class="form-control" id="kodejurusan" name="kodejurusan" required>
                        <span id="error_kodejur"></span>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Nama Jurusan:</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                        <span id="error_jurusan"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveKbk">Save</button>
                        <span id="error_kode"></span>

                </div>
            </form>
        </div>
    </div>
</div>