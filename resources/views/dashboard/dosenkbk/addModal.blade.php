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
                        <label for="nip">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" required>
                        <span id="error_nip"></span>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <span id="error_nama"></span>
                    </div>
                    <div class="input-group mb-3">
                        <label for="jurusan" class="mb-2">Jurusan:</label>
                        <select class="form-select w-100 px-2 py-2" name="jurusan" id="inputGroupSelect04"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="">Pilih Jurusan</option>
                            @foreach ($data_jur as $item)
                                <option class="dropdown-item" id="jurusan" value="{{ $item->kode_jurusan }}">
                                    {{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                        <span id="error_jurusan"></span>
                    </div>
                    <div class="input-group mb-3">
                        <label for="prodi" class="mb-2">Prodi:</label>
                        <select class="form-select w-100 px-2 py-2" name="prodi" id="inputGroupSelect04"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="" id="prodi">Pilih Prodi</option>
                            @foreach ($data_pro as $item)
                                <option class="dropdown-item" id="prodi" value="{{ $item->kode_prodi }}"
                                    href="#">{{ $item->prodi }}</option>
                            @endforeach
                        </select>
                        <span id="error_prodi"></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                        <span id="error_email"></span>
                    </div>

                    <div class="input-group mb-3">
                        <label for="status" class="mb-2">Status:</label>
                        <select class="form-select w-100 px-2 py-2" name="status" id="inputGroupSelect04"
                            aria-label="Example select with button addon" required data-parsley-group="block-0">
                            <option selected disabled value="" id="status">Pilih status</option>
                            @foreach ($status as $value => $label)
                                <option value="{{ $value }}" id="status"
                                    {{ isset($item) && $item->status == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        <span id="error_status"></span>
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
