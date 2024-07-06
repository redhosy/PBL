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
                        <label for="kode_matkul">Kode Matkul:</label>
                        <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_matkul">Nama Matkul:</label>
                        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" readonly>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <input type="text" class="form-control" id="semester" name="semester" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tp">T/P:</label>
                        <input type="text" class="form-control" id="tp" name="tp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_sks">Jumlah SKS:</label>
                        <input type="text" class="form-control" id="jumlah_sks" name="jumlah_sks" readonly>
                    </div>

                    <div class="form-group">
                        <label for="id_matkul">Pilih Matkul:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="id_matkul" name="id_matkul" required>
                                <option value="">Pilih Matkul</option>
                                @foreach ($matkul as $item)
                                    <option value="{{ $item->id }}"
                                        data-kode_matakuliah="{{ $item->kode_matakuliah }}"
                                        data-nama_matakuliah="{{ $item->nama_matakuliah }}"
                                        data-semester="{{ $item->semester }}" data-TP="{{ $item->TP }}"
                                        data-sks="{{ $item->sks }}">
                                        {{ $item->kode_matakuliah }} - {{ $item->nama_matakuliah }} -
                                        {{ $item->semester }} - {{ $item->TP }} - {{ $item->sks }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="error_matkul_id"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="prodi" name="prodi" required>
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
                            <select data-live-search="true" class="form-control w-100" id="kbk" name="kbk" required>
                                <option value="">Pilih KBK</option>
                                @foreach ($kbk as $item)
                                    <option value="{{ $item->id }}">{{ $item->kodekbk }}</option>
                                @endforeach
                            </select>
                            <span id="error_kbk" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pengampu">Pengampu Matakuliah:</label>
                        <div class="selectpicker">
                            <select data-live-search="true" class="form-control w-100" id="pengampu" name="pengampu">
                                <option value="">Pilih Pengampu Matakuliah: </option>
                                @foreach ($dosen as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <span id="error_pengampu" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary" id="saveKbk">Save</button>
                    <span id="error_kode" class="text-danger"></span>
                </div>
            </form>
        </div>
    </div>
</div>
