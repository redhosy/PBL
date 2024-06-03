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
                        <label for="editnip">NIP:</label>
                        <input type="text" class="form-control" id="editnip" name="nip" required>
                    </div>
                    <div class="form-group">
                        <label for="editnama">Nama:</label>
                        <input type="text" class="form-control" id="editnama" name="nama" required>
                    </div>
                    <div class="dropdown d-inline mr-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" name="jurusan"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            --Pilih Jurusan--
                        </button>
                        <div class="dropdown-menu" id="editjurusan" aria-labelledby="dropdownMenuButton">
                            @foreach ($data_jur as $item)
                                <a class="dropdown-item" href="#">{{ $item->jurusan }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jurusan">Prodi:</label>
                    <div class="dropdown d-inline mr-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" name="prodi"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            --Pilih Prodi--
                        </button>
                        <div class="dropdown-menu" id="editprodi" aria-labelledby="dropdownMenuButton">
                            @foreach ($data_pro as $item)
                                <a class="dropdown-item" href="#">{{ $item->prodi }}</a>
                            @endforeach
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