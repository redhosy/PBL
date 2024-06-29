<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addPostForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Verifikasi Berita Acara RPS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control selectpicker w-100" id="semester" name="semester">
                            <option value="">Pilih Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                        <span id="error_semester" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="matakuliah">Matakuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="matakuliah"
                                name="matakuliah">
                                <option value="">Pilih Matakuliah</option>
                                @foreach ($matkul as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_matakuliah }}</option>
                                @endforeach
                            </select>
                            <span id="error_matakuliah" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="evaluasi">Evaluasi:</label>
                        <textarea class="form-control" id="evaluasi" name="evaluasi" rows="3"></textarea>
                        <span id="error_evaluasi" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="ruang">Ruang:</label>
                        <input type="text" class="form-control" id="ruang" name="ruang"></input>
                        <span id="error_ruang" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"></input>
                        <span id="error_tanggal" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBeritaAcara">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
