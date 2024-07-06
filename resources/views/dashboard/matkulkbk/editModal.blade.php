<!-- Edit Modal -->
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
                        <label for="edit_kode_matkul">Kode Matkul:</label>
                        <input type="text" class="form-control" id="edit_kode_matkul" name="kode_matkul" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_matkul">Nama Matkul:</label>
                        <input type="text" class="form-control" id="edit_nama_matkul" name="nama_matkul" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_semester">Semester:</label>
                        <input type="text" class="form-control" id="edit_semester" name="semester" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_tp">T/P:</label>
                        <input type="text" class="form-control" id="edit_tp" name="TP" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_jumlah_sks">Jumlah SKS:</label>
                        <input type="text" class="form-control" id="edit_jumlah_sks" name="jumlah_sks" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editmatkul_id">Pilih Matkul:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editmatkul_id" name="editmatkul_id" required>
                                <option value="">Pilih Matkul</option>
                                @foreach ($matkul as $item)
                                    <option value="{{ $item->id }}" data-kode_matakuliah="{{ $item->kode_matakuliah }}"
                                        data-nama_matakuliah="{{ $item->nama_matakuliah }}" data-semester="{{ $item->semester }}"
                                        data-TP="{{ $item->TP }}" data-sks="{{ $item->sks }}">
                                        {{ $item->kode_matakuliah }} - {{ $item->nama_matakuliah }} -
                                        {{ $item->semester }} - {{ $item->TP }} - {{ $item->sks }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="edit_error_matkul_id"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_prodi">Prodi:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="edit_prodi" name="prodi" required>
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="edit_error_prodi"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_kbk">KBK:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="edit_kbk" name="kbk" required>
                                <option value="">Pilih KBK</option>
                                @foreach ($kbk as $item)
                                    <option value="{{ $item->id }}">{{ $item->kodekbk }}</option>
                                @endforeach
                            </select>
                            <span id="edit_error_kbk" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_pengampu">Pengampu Matakuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="edit_pengampu" name="pengampu">
                                <option value="">Pilih Pengampu Matakuliah: </option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <span id="edit_error_pengampu"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <span id="edit_error_kode"></span>
                </div>
            </form>
        </div>
    </div>
</div>
