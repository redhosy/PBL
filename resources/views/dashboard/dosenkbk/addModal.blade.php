<!-- addModal.blade.php -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addPostForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP:</label>
                        <input type="text" class="form-control" id="nip" name="nip" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dosen_id">Pilih Dosen:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="dosen_id" name="dosen_id"
                                required>
                                <option value="">Pilih Dosen</option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                        data-nip="{{ $item->nip }}" data-email="{{ $item->email }}">
                                        {{ $item->nama }} - {{ $item->nip }} - {{ $item->email }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_dosen_id"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <select class="form-control w-100 selectpicker" id="jurusan" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="error_jurusan"></span>
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
                        <label for="kbk">KBK:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="kbk" name="kbk"
                                required>
                                <option value="">Pilih KBK</option>
                                @foreach ($datakbk as $kbk)
                                    <option value="{{ $kbk->id }}">
                                        {{ $kbk->kodekbk }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_kbk"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <select class="form-control w-100 selectpicker" id="jabatan" name="jabatan" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach ($jabatan as $item)
                                <option value="{{ $item->id }}">{{ $item->jabatan_pimpinan }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="error_jabatan"></span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control  w-100 selectpicker" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                        <span class="text-danger" id="error_status"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary" id="saveKbk">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
