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
                        <label for="kode_matkul">Kode Matkul:</label>
                        <input type="text" class="form-control" id="edit_kode_matkul" name="kode_matkul" required
                            value="{{ $data->kode_matkul ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_matkul">Nama Matkul:</label>
                        <input type="text" class="form-control" id="edit_nama_matkul" name="nama_matkul" required
                            value="{{ $data->nama_matkul ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control" id="edit_semester" name="semester" required>
                            <option value="">Pilih Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tp">T/P:</label>
                        <select class="form-control selectpicker w-100" id="edit_tp" name="tp" required>
                            <option value="">Pilih T/P</option>
                            <option value="T">T</option>
                            <option value="P">P</option>
                            <option value="T/P">T/P</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kbk">KBK:</label>
                        <select class="form-control" id="edit_kbk" name="kbk" required>
                            <option value="">Pilih KBK</option>
                            @foreach ($kbk as $item)
                                <option value="{{ $item->id }}">{{ $item->kodekbk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="edit_prodi" name="prodi"
                                required>
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_sks">Jumlah SKS:</label>
                        <input type="number" class="form-control" id="edit_jumlah_sks" name="jumlah_sks" required
                            value="{{ $data->jumlah_sks ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="pengampu">Pengampu Matakuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="edit_pengampu" name="pengampu">
                                <option value="">Pilih Pengampu Matakuliah: </option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
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
