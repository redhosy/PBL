<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editDataForm">
                <input type="hidden" id="editDataId">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editkodesoal">Kode Soal:</label>
                        <input type="text" class="form-control" id="editkodesoal" name="kodesoal" required>
                    </div>

                    <div class="form-group">
                        <label for="editdosen_pengampu">Dosen Pengampu:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editdosen_pengampu"
                                name="dosen_pengampu">
                                <option value="">Pilih Dosen Pengampu: </option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editkode_matkul">Mata Kuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editkode_matkul"
                                name="kode_matkul" required>
                                <option value="">Pilih Mata Kuliah</option>
                                @foreach ($damatkul as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_matakuliah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editdokumen">Dokumen (PDF):</label>
                        <div class="dokumen_preview"></div>
                        <input type="file" class="form-control-file" id="editdokumen" name="dokumen"
                            accept="application/pdf">
                        <small class="form-text text-muted">Maksimal ukuran file: 2 MB</small>
                    </div>

                    <div class="form-group">
                        <label for="edittanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="edittanggal" name="tanggal" required>
                    </div>

                    <div class="form-group"> 
                        <label for="editthnakd">Tahun Akademik:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editthnakd" name="thnakd"
                                required>
                                <option value="">Pilih Tahun Akademik</option>
                                @foreach ($thnakd as $item)
                                    <option value="{{ $item->id }}">{{ $item->smt_thn_akd }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
