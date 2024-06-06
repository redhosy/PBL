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
                    <input type="hidden" id="editDataId" name="id">
                    <div class="form-group">
                        <label for="editnip">NIP:</label>
                        <input type="text" class="form-control" id="editnip" name="nip" required>
                    </div>
                    <div class="form-group">
                        <label for="editnama">Nama:</label>
                        <input type="text" class="form-control" id="editnama" name="nama" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="editjurusan" class="mb-2">Jurusan:</label>
                        <select class="form-select w-100 px-2 py-2" name="jurusan" id="inputGroupSelect04"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="">Pilih Jurusan</option>
                            @foreach ($data_jur as $item)
                                <option class="dropdown-item" id="editjurusan" value="{{ $item->kode_jurusan }}">
                                    {{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <label for="editprodi" class="mb-2">Prodi:</label>
                        <select class="form-select w-100 px-2 py-2" name="prodi" id="inputGroupSelect04"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="">Pilih Prodi</option>
                            @foreach ($data_pro as $item)
                                <option class="dropdown-item" id="editprodi" value="{{ $item->kode_prodi }}"
                                    href="#">{{ $item->prodi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <label for="editstatus" class="mb-2">Status:</label>
                        <select class="form-select w-100 px-2 py-2" name="status" id="inputGroupSelect04"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="">Pilih status</option>
                            @foreach ($status as $value => $label)
                                <option value="{{ $value }}" id="editstatus"
                                    {{ isset($item) && $item->status == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
