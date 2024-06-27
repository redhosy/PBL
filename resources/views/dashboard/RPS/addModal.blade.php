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
                        <span id="error_koderps" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="dosen_pengembang">Dosen Pengembang:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="dosen_pengembang" name="dosen_pengembang">
                                <option value="">Pilih Dosen Pengembang: </option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <span id="error_dosen_pengembang" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kode_matkul">Mata Kuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="kode_matkul"
                                name="kode_matkul" required>
                                <option value="">Pilih MataKuliah</option>
                                @foreach ($damatkul as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_matakuliah }}</option>
                                @endforeach 
                            </select>
                            <span id="error_kode_matkul" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dokumen">Dokumen (PDF):</label>
                        <input type="file" class="form-control-file" id="dokumen" name="dokumen"
                            accept="application/pdf">
                        <span id="error_dokumen" class="text-danger"></span>
                        <small class="form-text text-muted">Maksimal ukuran file: 2 MB</small>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        <span id="error_tanggal" class="text-danger"></span>
                    </div>                    

                    <div class="form-group">
                        <label for="thnakd">Tahun Akademik:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="thnakd"
                                name="thnakd" required>
                                <option value="">Pilih Tahun Akademik</option>
                                @foreach ($thnakd as $item)
                                    <option value="{{ $item->id }}">{{ $item->smt_thn_akd }}</option>
                                @endforeach
                            </select>
                            <span id="error_thnakd" class="text-danger"></span>
                        </div>
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
