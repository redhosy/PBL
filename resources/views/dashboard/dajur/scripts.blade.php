<script>
    if (typeof jQuery !== 'undefined') {
        console.log("jQuery is loaded");
    } else {
        console.error("jQuery is not loaded");
    }

    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Clear error messages
        function clearErrorMsg() {
            $('#jurusan').removeClass('is-invalid');
            $('#error_jurusan').html('');

            $('#kodejurusan').removeClass('is-invalid');
            $('#error_kodejur').html('');
        }

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');
        });

        $('#saveKbk').on('click', function() {
            let formData = $('#addPostForm').serialize();
            console.log('Sending data:', formData);
            $.ajax({
                url: "{{ url('dajur') }}",
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text('Data berhasil ditambahkan!');

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 3000);

                    location.reload();
                },
                error: function(errors) {
                    console.log(errors)
                    const error = errors.responseJSON.errors;
                    clearErrorMsg();

                    if (error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('#error_jurusan').html(`<div class="text-danger">${error.jurusan}</div>`);
                    }

                    if (error.kodejurusan) {
                        $('#kodejurusan').addClass('is-invalid');
                        $('#error_kodejur').html(`<div class="text-danger">${error.kodejurusan}</div>`);
                    }
                    console.log(errors);
                }
            })
        });

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('dajur') }}/" + dataId + "/edit", function(response) {
                console.log(response);
                $('#editDataId').val(response.data.id);
                $('#editkodejurusan').val(response.data.kode_jurusan);
                $('#editjurusan').val(response.data.jurusan);
                $('#editModal').modal('show');
            });
        });

        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('dajur') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#data' + response.data.id).html(
                        '<td>' + response.data.id + '</td>' +
                        '<td>' + response.data.kodejurusan + '</td>' +
                        '<td>' + response.data.jurusan + '</td>' +
                        '<td><button class="btn btn-primary editBtn" data-id="' + response.data.id + '">Edit</button> ' +
                        '<button class="btn btn-danger deleteBtn" data-id="' + response.data.id + '">Delete</button></td>'
                    );
                    alert('Data berhasil diupdate');
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            $('#edit' + key.charAt(0).toUpperCase() + key.slice(1)).addClass('is-invalid');
                            $('#edit' + key.charAt(0).toUpperCase() + key.slice(1) + '-error').text(value[0]);
                        });
                    }
                }
            });
        });

        // Detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');
            console.log("Button clicked, data ID:", itemId);
            $.get("{{ url('dajur') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                $('#editDataId').text(response.data.id);
                $('#detailjur').text(response.data.kode_jurusan);
                $('#detailnama').text(response.data.jurusan);
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Pencarian
        $('#searchButton').on('click', function() {
            var value = $('#searchInput').val().toLowerCase();
            $("#dataTable tr").filter(function() {
                var kode_jurusan = $(this).find('td:nth-child(2)').text().toLowerCase();
                var jurusan = $(this).find('td:nth-child(3)').text().toLowerCase();
                $(this).toggle(kode_jurusan.indexOf(value) > -1 || jurusan.indexOf(value) > -1);
            });
        });

        // Delete
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
                url: "{{ url('dajur') }}/" + dataId,
                method: 'DELETE',
                success: function(res) {
                    console.log(res);
                    $('#data' + dataId).remove();
                    $('#modalDelete').modal('hide');
                    $('#success-alert').removeClass('d-none').text('Data berhasil dihapus!');

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
