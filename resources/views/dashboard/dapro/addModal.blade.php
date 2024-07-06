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
                        <label for="kodeprodi">Kode Prodi:</label>
                        <input type="text" class="form-control" id="kodeprodi" name="kodeprodi" required>
                        <span id="error_kodeprodi"></span>
                    </div>
                    <div class="form-group">
                        <label for="namaprodi">Nama Prodi:</label>
                        <input type="text" class="form-control" id="namaprodi" name="namaprodi" required>
                        <span id="error_namaprodi"></span>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control w-100 selectpicker" id="jurusan" name="jurusan">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                        <span id="error_jurusan"></span>
                    </div>
                    <div class="form-group">
                        <label for="jenjang">Jenjang:</label>
                        <input type="text" class="form-control" id="jenjang" name="jenjang" required>
                        <span id="error_jenjang"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary" id="saveKbk">Save</button>
                        <span id="error_kode"></span>

                </div>
            </form>
        </div>
    </div>
</div>