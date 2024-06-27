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
                        <label for="kode_matkul">Kode Matkul:</label>
                        <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
                        <span id="error_kode_matkul" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="nama_matkul">Nama Matkul:</label>
                        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
                        <span id="error_nama_matkul" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control selectpicker w-100" id="semester" name="semester" required>
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
                        <span id="error_semester" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="ket">T/P:</label>
                        <select class="form-control selectpicker w-100" id="ket" name="ket" required>
                            <option value="">Pilih T/P</option>
                            <option value="T">T</option>
                            <option value="P">P</option>
                            <option value="T/P">T/P</option>
                        </select>
                        <span id="error_ket" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="kbk">KBK:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="kbk" name="kbk" required>
                                <option value="">Pilih KBK</option>
                                @foreach ($kbk as $item)
                                    <option value="{{ $item->id }}">{{ $item->kodekbk }}</option>
                                @endforeach
                            </select>
                            <span id="error_kbk" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="prodi" name="prodi"
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
                        <label for="jumlah_sks">Jumlah SKS:</label>
                        <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" required>
                        <span id="error_jumlah_sks" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="pengampu">Pengampu Matakuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="pengampu" name="pengampu">
                                <option value="">Pilih Pengampu Matakuliah: </option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <span id="error_pengampu"></span>
                        </div>
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
