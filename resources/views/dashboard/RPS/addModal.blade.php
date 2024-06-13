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
                        <label for="koderps">Kode RPS:</label>
                        <input type="text" class="form-control" id="koderps" name="koderps" required>
                        <span id="error_koderps"></span>
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

                        <div class="input-group mb-3">
                            <label for="versi" class="mb-2">Versi:</label>
                            <select class="form-select w-100 px-2 py-2" name="versi" id="versi"
                                aria-label="Example select with button addon" required data-parsley-group="block-0">
                                <option selected disabled value="">Pilih Versi</option>
                                @foreach ($versi as $item)
                                    <option class="dropdown-item" id="smt_thn_akd" value="{{ $item->versi }}">
                                        {{ $item->smt_thn_akd }}</option>
                                @endforeach
                            </select>
                            <span id="error_versi"></span>
                        </div>
                            <div class="form-group">
                                <label for="dokumen">Dokumen:</label>
                                <input type="file" class="form-control-file" id="dokumen" name="dokumen" accept="application/pdf">
                                <span id="error_dokumen"></span>
                            </div>
                            
                        <div class="form-group">
                            <label for="dosen">Dosen Pengembang:</label>
                            <input type="text" class="form-control" id="dosen" name="dosen" required>
                            <span id="error_dosen"></span>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveRps">Save</button>
                        <span id="error_kode"></span>

                </div>
            </form>
        </div>
    </div>
</div>