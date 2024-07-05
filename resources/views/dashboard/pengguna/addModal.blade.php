<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addUserForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <span class="text-danger" id="error_nama"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span class="text-danger" id="error_email"></span>
                    </div>
                    <div class="form-group">
                        <label for="peran">Peran:</label>
                        <select class="form-control" id="peran" name="peran" required>
                            <option value="super admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="pimpinan jurusan">Pimpinan Jurusan</option>
                            <option value="pimpinan program studi">Pimpinan Program Studi</option>
                            <option value="dosen pengampu">Dosen Pengampu</option>
                            <option value="pengurus kbk">Pengurus KBK</option>
                        </select>
                        <span class="text-danger" id="error_peran"></span>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('randomPassword') }}" readonly>
                        <span id="error_password"></span>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="button" class="btn btn-primary" id="saveKbk">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
