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
                <div class="form-group">
                    <label for="kodesoal">Kode Soal:</label>
                    <input type="text" class="form-control" id="kodesoal" name="kodesoal" required>
                    <span id="error_kodesoal"></span>
                </div>
                <div class="input-group mb-3">
                    <label for="kode_matkul" class="mb-2">Kode Matkul:</label>
                    <select class="form-select w-100 px-2 py-2" name="kode_matkul" id="kode_matkul"
                        aria-label="Example select with button addon" required data-parsley-group="block-0">
                        <option selected disabled value="">Pilih Kode Matkul</option>
                        @foreach ($kode_matkul as $item)
                            <option class="dropdown-item" id="kode_matakuliah" value="{{ $item->kode_matkul }}">
                                {{ $item->kode_matakuliah }}</option>
                        @endforeach
                    </select>
                    <span id="error_kode_matkul"></span>
                </div>
                <div class="form-group">
                    <label for="dosen">Dosen Pengampu:</label>
                    <input type="text" class="form-control" id="dosen" name="dosen" required>
                    <span id="error_dosen"></span>
                </div>

                <div class="form-group">
                    <label for="dokumen">Dokumen:</label>
                    <input type="file" class="form-control-file" id="dokumen" name="dokumen" accept="application/pdf">
                    <span id="error_dokumen"></span>
                    </div>
                    
                    <div class="input-group mb-3">
                        <label for="tahunakademik" class="mb-2">Tahun Akademik:</label>
                        <select class="form-select w-100 px-2 py-2" name="tahunakademik" id="tahunakademik"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="">Pilih tahunakademik</option>
                            @foreach ($tahunakademik as $item)
                                <option class="dropdown-item" id="smt_thn_akd" value="{{ $item->tahunakademik }}">
                                    {{ $item->smt_thn_akd }}</option>
                            @endforeach
                        </select>
                        <span id="error_tahunakademik"></span>
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
