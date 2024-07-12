<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editBeritaAcaraForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Verifikasi Berita Acara RPS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editDataId" name="id">
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select class="form-control selectpicker w-100" id="editsemester" name="semester">
                            <option value="">Pilih Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="matakuliah">Matakuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="editmatakuliah"
                                name="matakuliah">
                                <option value="">Pilih Matakuliah</option>
                                @foreach ($matkul as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_matakuliah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="evaluasi">Evaluasi:</label>
                        <textarea class="form-control" id="editevaluasi" name="evaluasi" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="ruang">Ruang:</label>
                        <input type="text" class="form-control" id="editruang" name="ruang"></input>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="edittanggal" name="tanggal"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary" id="saveEditBeritaAcara">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
