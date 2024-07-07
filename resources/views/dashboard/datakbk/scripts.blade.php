<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      
        // response invalid
        function clearErrorMsg() {
            $('#deskripsi').removeClass('is-invalid');
            $('#error_deskripsi').html(``)

            $('#nama').removeClass('is-invalid');
            $('#error_nama').html(``)

            $('#kodekbk').removeClass('is-invalid');
            $('#error_kode').html(``)

        }

        //tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');

        });

        $('#saveKbk').on('click', function() {
            let formData = $('#addPostForm').serialize();
            $.ajax({
                url: "{{ url('datakbk') }}",
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').removeClass('d-none');
                    }, 5000);

                    location.reload();
                },
                error: function(errors) {
                    const error = errors.responseJSON.errors;
                    console.log(errors)
                    clearErrorMsg();
                    if (error.deskripsi) {
                        $('#deskripsi').addClass('is-invalid');
                        $('#error_deskripsi').html(
                            `<div class="text-danger">${error.deskripsi}</div>`)
                    }

                    if (error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('#error_nama').html(
                            `<div class="text-danger">${error.nama}</div>`)
                    }

                    if (error.kodekbk) {
                        $('#kodekbk').addClass('is-invalid');
                        $('#error_kode').html(
                            `<div class="text-danger">${error.kodekbk}</div>`)
                    }
                    console.log(errors)
                }
            });
        })

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('datakbk') }}/" + dataId + "/edit", function(response) {
                $('#editDataId').val(response.data.id);
                $('#editKodekbk').val(response.data.kodekbk);
                $('#editNama').val(response.data.nama);
                $('#editDeskripsi').val(response.data.deskripsi);
                $('#editModal').modal('show');
            });
        });

        // Form submit for update
        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('datakbk') }}/" + dataId,
                method: 'PUT', // Menggunakan metode PUT untuk update
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil diperbarui.');

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 3000);

                    location.reload();
                    // $('#dataTable').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    console.log(xhr)
                    let errors = xhr.responseJSON.errors;
                    console.log(errors); // Handle errors appropriately
                }
            });
        });

        //detail
        $(document).on('click', '.detailBtn', function() {
            let dataId = $(this).data('id');
            console.log("Button clicked, data ID:", dataId);
            $.get("{{ url('datakbk') }}/" + dataId, function(response) {
                console.log(response)
                $('#editDataId').text(response.data.id);
                $('#detailKodekbk').text(response.data.kodekbk);
                $('#detailNama').text(response.data.nama);
                $('#detailDeskripsi').text(response.data.deskripsi);
                $('#detailModal').modal('show');
            });
        });

        // pencarian 
        var table = $('#dataTable').DataTable();
        $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });



        $(document).on('click', '.deleteBtn', function() {
            let dataId = $(this).data('id');
            $('#modalDelete').modal('show');
            $('#confirmDelete').data('id', dataId);
        });

        // Confirm deletion
        $('#confirmDelete').click(function() {
            var dataId = $(this).data('id');
            $.ajax({
                url: "{{ url('datakbk') }}/" + dataId,
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
