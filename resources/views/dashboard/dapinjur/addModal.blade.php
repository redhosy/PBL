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
                        <label for="jabpim">Jabatan Pimpinan:</label>
                        <select class="form-control w-100 selectpicker" id="jabpim" name="jabpim">
                            <option value="">Pilih Jabatan</option>
                            @foreach ($jabpim as $item)
                                <option value="{{ $item->id }}">{{ $item->jabatan_pimpinan }}</option>
                            @endforeach
                        </select>
                        <span id="error_jabpim"></span>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="nama" name="nama">
                                <option value="">Pilih Dosen</option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <span id="error_nama"></span>
                        </div>
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
                        <label for="periode_start">Periode Mulai</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="periode_start"
                                name="periode_start">
                                <option value="">Pilih Tahun Mulai</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <span id="error_periode_start" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="periode_end">Periode Selesai</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="periode_end"
                                name="periode_end">
                                <option value="">Pilih Tahun Selesai</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <span id="error_periode_end" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control w-100 selectpicker" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <span id="error_status"></span>
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
