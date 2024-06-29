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
                        <label for="editnama">Nama:</label>
                        <input type="text" class="form-control" id="editnama" name="editnama" required>
                    </div>
                    <div class="form-group">
                        <label for="editnidn">NIDN:</label>
                        <input type="text" class="form-control" id="editnidn" name="editnidn" required>
                    </div>
                    <div class="form-group">
                        <label for="editnip">NIP:</label>
                        <input type="number" class="form-control" id="editnip" name="editnip" required>
                    </div>
                    <div class="form-group">
                        <label for="editemail">Email:</label>
                        <input type="email" class="form-control" id="editemail" name="editemail" required>
                    </div>
                    <div class="form-group">
                        <label for="editgender">Gender</label>
                        <select class="form-control w-100 selectpicker" id="editgender" name="editgender" required data-parsley-group="block-1">
                            <option value="">Pilih Gender</option>
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editjurusan">Jurusan</label>
                        <select class="form-control w-100 selectpicker" id="editjurusan" name="editjurusan">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editprodi">Prodi</label>
                        <select class="form-control w-100 selectpicker" id="editprodi" name="editprodi">
                            <option value="">Pilih Prodi</option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editgambar">Image:</label>
                        <input type="text" class="form-control" id="editgambar" name="editgambar" required>
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
