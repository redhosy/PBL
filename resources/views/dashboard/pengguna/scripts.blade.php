<script>
    // Add Data
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');
        });

        $('#saveKbk').click(function() {
            $.ajax({
                url: "{{ route('pengguna.store') }}",
                type: "POST",
                data: $('#addUserForm').serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'User berhasil ditambahkan! Email dengan password sementara telah dikirim.'
                    );

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 8000);

                    // $('#dataPengguna').DataTable().ajax.reload();
                    location.reload();

                    $('#addUserForm')[0].reset();
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_nama').text(errors.nama ? errors.nama[0] : '');
                        $('#error_email').text(errors.email ? errors.email[0] : '');
                        $('#error_peran').text(errors.peran ? errors.peran[0] : '');
                        $('#error_password').text(errors.password ? errors.password[0] :
                            '');
                    }
                }
            });
        });

        // Detail
        $(document).on('click', '.detailBtn', function() {
            $('#detailModal').modal('show');

            var userId = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "pengguna/" + userId,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#detailDataId').text(response
                    .id); // Pastikan properti sesuai dengan response dari server
                    $('#detailnama').text(response.name);
                    $('#detailemail').text(response.email);
                    $('#detailrole').text(response.role);
                },
                error: function(error) {
                    console.log(error);
                    alert('Failed to fetch user details.');
                }
            });
        });


        //edit
        $(document).on('click', '.editBtn', function() {
            let itemId = $(this).data('id');

            $.ajax({
                type: "get",
                url: "pengguna/" + itemId + "/edit",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('#editModal').modal('show');
                        $('#editDataId').val(response.data.id);
                        $('#editemail').val(response.data.email);
                        $('#editnama').val(response.data.name);
                        $('#editperan').val(response.data.role);
                    } else {
                        console.error('Data not found');
                    }
                },
                error: function(error) {
                    console.error('Failed to fetch data', error);
                }
            });
        });


        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('pengguna') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'User berhasil ditambahkan! Email dengan password sementara telah dikirim.'
                    );

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 6000);

                    // $('#dataPengguna').DataTable().ajax.reload();
                    location.reload();

                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    console.log(xhr)
                }
            });
        });


        //tooltip
        $('[data-toggle="tooltip"]').tooltip();


        $('#dataTable').DataTable();
        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        //  Delete
        $(document).on('click', '.deleteBtn', function() {
            // alert('lll')
            let dataId = $(this).data('id');
            $('#modalDelete').modal('show');
            $('#confirmDelete').data('id', dataId);
        });

        // Confirm deletion
        $('#confirmDelete').click(function() {
            var dataId = $(this).data('id');
            $.ajax({
                url: "{{ url('pengguna') }}/" + dataId,
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
