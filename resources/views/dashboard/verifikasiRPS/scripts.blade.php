<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Filter by tanggal
        $('#filterTanggal').on('change', function() {
            var selectedDate = $(this).val();
            var table = $('#dataTable1').DataTable();
            table.column(4).search(selectedDate).draw();
        });

        // Print
        $('#cetakBeritaAcara').on('click', function() {
            var selectedDate = $('#filterTanggal').val();
            window.location.href = "/verifikasiRPS/cetak?tanggal=" + selectedDate;
        });


        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Show add modal
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');
        });

        // Save new data
        $('#saveBeritaAcara').click(function() {
            $.ajax({
                url: "{{ route('verifikasiRPS.store') }}",
                type: "POST",
                data: $('#addPostForm').serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);
                    location.reload(); // Reload halaman untuk menampilkan perubahan
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_semester').text(errors.semester ? errors.semester[0] :
                            '');
                        $('#error_matakuliah').text(errors.matakuliah ? errors.matakuliah[
                            0] : '');
                        $('#error_evaluasi').text(errors.evaluasi ? errors.evaluasi[0] :
                            '');
                        $('#error_ruang').text(errors.ruang ? errors.ruang[0] : '');
                        $('#error_tanggal').text(errors.tanggal ? errors.tanggal[0] : '');
                    }
                }
            });
        });

        // Show Edit Modal
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            console.log(response);
            $.get("{{ url('verifikasiRPS') }}/" + dataId + "/edit", function(response) {
                $('#editDataId').val(response.data.id);
                $('#editsemester').val(response.data.semester);
                $('#editmatakuliah').val(response.data.matakuliah); // Sesuaikan ini dengan struktur data Anda
                $('#editevaluasi').val(response.data.evaluasi);
                $('#editruang').val(response.data.ruang);
                $('#edittanggal').val(response.data.tanggal);
                $('#editModal').modal('show');
            });
        });


        // Update Data
        $('#editBeritaAcaraForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('verifikasiRPS') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil diperbarui.');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                        location.reload();
                    }, 3000);
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    console.log(errors);
                }
            });
        });


        // pencarian
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        //dropdownsearch
        $('.selectpicker select').selectpicker();

        // Initialize DataTables
        $('#dataTable1').DataTable();

        // Show Delete Modal
        $(document).on('click', '.deleteBtn', function() {
            let dataId = $(this).data('id');
            $('#modalDelete').modal('show');
            $('#confirmDelete').data('id', dataId);
        });

        // Confirm Delete
        $('#confirmDelete').click(function() {
            let dataId = $(this).data('id');
            $.ajax({
                url: "{{ url('verifikasiRPS') }}/" + dataId,
                method: 'DELETE',
                success: function(res) {
                    $('#data' + dataId).remove();
                    $('#modalDelete').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil dihapus!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 3000);

                    location.reload(); // Reload halaman untuk menampilkan perubahan
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('Failed to delete data');
                }
            });
        });
    });
</script>
