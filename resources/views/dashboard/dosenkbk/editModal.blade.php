<!-- editModal.blade.php -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editPostForm">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editDataId" name="id">
                    <div class="form-group">
                        <label for="edit_nama">Nama:</label>
                        <input type="text" class="form-control" id="editnama" name="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_nip">NIP:</label>
                        <input type="text" class="form-control" id="editnip" name="nip" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email:</label>
                        <input type="email" class="form-control" id="editemail" name="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editdosen">Pilih Dosen:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editdosen" name="editdosen"
                                required>
                                <option value="">Pilih Dosen</option>
                                @foreach ($dosen as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }} - {{ $dosen->nip }} -
                                        {{ $dosen->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <select class="form-control w-100 selectpicker" id="editjurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="error_jurusan"></span>
                    </div> 
                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <div class="selectpicker">
                            {{-- <input type="text" id="prodi"> --}}
                            <select data-live-search="true" class="form-control w-100" id="editprodi" name="prodi"
                                required>
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_prodi"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_kbk">KBK:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editkbk" name="kbk"
                                required>
                                <option value="">Pilih KBK</option>
                                @foreach ($datakbk as $kbk)
                                    <option value="{{ $kbk->id }}">{{ $kbk->kodekbk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_jabatan">Jabatan:</label>
                        <select class="form-control w-100 selectpicker" id="editjabatan" name="jabatan" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach ($jabatan as $item)
                                <option value="{{ $item->id }}">{{ $item->jabatan_pimpinan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status:</label>
                        <select class="form-control w-100 selectpicker" id="editstatus" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateKbk">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
