<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editDataForm">
                <input type="hidden" name="id" id="editDataId">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editDataId" name="id">
                    <div class="form-group">
                        <label for="editnama">Nama:</label>
                        <input type="text" class="form-control" id="editnama" name="editnama" required>
                    </div>
                    <div class="form-group">
                        <label for="editemail">Email:</label>
                        <input type="email" class="form-control" id="editemail" name="editemail" required>
                    </div>
                    <div class="form-group">
                        <label for="editperan">peran:</label>
                        <select class="form-control" id="editperan" name="editperan" required>
                            <option value="super admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="pimpinan jurusan">Pimpinan Jurusan</option>
                            <option value="pimpinan program studi">Pimpinan Program Studi</option>
                            <option value="dosen pengampu">Dosen Pengampu</option>
                            <option value="pengurus kbk">Pengurus KBK</option>
                        </select>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('randomPassword') }}" readonly>
                        <span id="error_password"></span>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
