<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');
        });

        $('#saveKbk').click(function() {
            $.ajax({
                url: "{{ route('matkulkbk.store') }}",
                type: "POST",
                data: $('#addPostForm').serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_kode_matkul').text(errors.kode_matkul ? errors
                            .kode_matkul[0] : '');
                        $('#error_nama_matkul').text(errors.nama_matkul ? errors
                            .nama_matkul[0] : '');
                        $('#error_semester').text(errors.semester ? errors.semester[0] :
                            '');
                        $('#error_ket').text(errors.ket ? errors.ket[0] : '');
                        $('#error_kbk').text(errors.kbk ? errors.kbk[0] : '');
                        $('#error_prodi').text(errors.prodi ? errors.prodi[0] : '');
                        $('#error_jumlah_sks').text(errors.jumlah_sks ? errors.jumlah_sks[
                            0] : '');
                        $('#error_pengampu').text(errors.pengampu ? errors.pengampu[0] :
                            '');
                    }
                }
            });
        });

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('matkulkbk') }}/" + dataId + "/edit", function(response) {
                console.log(response);
                
                $('#editModal').modal('show');
                $('#editDataId').val(response.data.id);
                $('#edit_kode_matkul').val(response.data.kode_matkul);
                $('#edit_nama_matkul').val(response.data.nama_matkul);
                $('#edit_semester').selectpicker('val', response.data.semester);
                $('#edit_tp').selectpicker('val', response.data.ket);
                $('#edit_kbk').selectpicker('val', response.data.id_datakbk);
                $('#edit_prodi').selectpicker('val', response.data.id_prodi);
                $('#edit_jumlah_sks').val(response.data.jumlah_sks);
                $('#edit_pengampu').selectpicker('val', response.data.id_dosen);
            });
        });


        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            console.log($('#editDataId').val());
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('matkulkbk') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil diUpdate! '
                    );

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);

                    location.reload();

                },
                error: function(xhr) {
                    console.log(xhr);
                    let errors = xhr.responseJSON.errors;
                }
            });
        });

        // Detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');
            console.log("Button clicked, data ID:", itemId);

            $.get("{{ url('matkulkbk') }}/" + itemId, function(response) {
                console.log(response);

                // Menampilkan modal detail
                $('#detailModal').modal('show');

                // Mengisi data detail ke dalam modal
                $('#detailDataId').text(response.data[0].id);
                $('#detailKodeMatkul').text(response.data[0].kode_matkul);
                $('#detailNamaMatkul').text(response.data[0].nama_matkul);
                $('#detailSemester').text(response.data[0].semester);
                $('#detailTp').text(response.data[0].ket);
                $('#detailKbk').text(response.data[0].kbk.kodekbk);
                $('#detailProdi').text(response.data[0].prodi.prodi);
                $('#detailJumlahSks').text(response.data[0].jumlah_sks);
                $('#detailPengampu').text(response.data[0].dosen.nama);
            }).fail(function(error) {
                console.error('Failed to fetch data');
                console.log(error);
            });
        });


        $('#dataTable').DataTable();
        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        //dropdownsearch
        $('.selectpicker select').selectpicker();


        $(document).on('click', '.deleteBtn', function() {
            let dataId = $(this).data('id');
            $('#modalDelete').modal('show');
            $('#confirmDelete').data('id', dataId);
        });

        // Confirm deletion
        $('#confirmDelete').click(function() {
            var dataId = $(this).data('id');
            $.ajax({
                url: "{{ url('matkulkbk') }}/" + dataId,
                method: 'DELETE',
                success: function(res) {
                    console.log(res);
                    $('#data' + dataId).remove();
                    $('#modalDelete').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil dihapus!');

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 3000);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Failed to delete data');
                }
            });
        });
    });
</script>
