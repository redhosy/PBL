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
                        <label for="KodeMatkul">Kode Matkul:</label>
                        <input type="text" class="form-control" id="KodeMatkul" name="KodeMatkul" required>
                        <span id="error_KodeMatkul"></span>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama Matkul:</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" required>
                        <span id="error_Nama"></span>
                    </div>
                    <div class="form-group">
                        <label for="Jumlahsks">Jumlah SKS:</label>
                        <input type="text" class="form-control" id="Jumlahsks" name="Jumlahsks" required>
                        <span id="error_Jumlahsks"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveKbk">Save</button>
                        <span id="error_kode"></span>

                </div>
            </form>
        </div>
    </div>
</div>