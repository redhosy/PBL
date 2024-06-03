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
                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <div class="dropdown d-inline mr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" name="jurusan"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                --Pilih Jurusan--
                            </button>
                            <div class="dropdown-menu" id="jurusan" aria-labelledby="dropdownMenuButton">
                                @foreach ($data_jur as $item)
                                    <a class="dropdown-item" href="#">{{ $item->jurusan }}</a>
                                @endforeach
                            </div>
                        </div>
                        <span id="error_jurusan"></span>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Prodi:</label>
                        <div class="dropdown d-inline mr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" name="prodi"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                --Pilih Prodi--
                            </button>
                            <div class="dropdown-menu" id="prodi" aria-labelledby="dropdownMenuButton">
                                @foreach ($data_pro as $item)
                                    <a class="dropdown-item" href="#">{{ $item->prodi }}</a>
                                @endforeach
                            </div>
                        </div>
                        <span id="error_prodi"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                        <span id="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Status:</label>
                        <div class="dropdown d-inline mr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" name="status"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                --Pilih Status--
                            </button>
                            <div class="dropdown-menu" id="status" aria-labelledby="dropdownMenuButton">
                                @foreach($dosenkbk as $user)
                                    <a class="dropdown-item" href="#">
                                        {{ $user->status }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
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
