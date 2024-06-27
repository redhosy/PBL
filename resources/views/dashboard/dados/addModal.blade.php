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
                        <label for="nama">Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <span id="error_nama"></span>
                    </div>

                    <div class="form-group">
                        <label for="nidn">NIDN :</label>
                        <input type="number" class="form-control" id="nidn" name="nidn" required>
                        <span id="error_nidn"></span>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP :</label>
                        <input type="number" class="form-control" id="nip" name="nip" required>
                        <span id="error_nip"></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span id="error_email"></span>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control w-100 selectpicker" id="gender" name="gender" required data-parsley-group="block-1">
                            <option value="">Pilih Gender</option>
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                        <span id="error_gender"></span>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control w-100 selectpicker" id="jurusan" name="jurusan">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                        <span id="error_jurusan"></span>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select class="form-control w-100 selectpicker" id="prodi" name="prodi">
                            <option value="">Pilih Prodi</option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                            @endforeach
                        </select>
                        <span id="error_prodi"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control w-100 selectpicker" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <span id="error_status"></span>
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
