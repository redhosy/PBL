<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function clearErrorMsg() {
            $('#deskripsi').removeClass('is-invalid');
            $('#error_deskripsi').html(``)

            $('#nama').removeClass('is-invalid');
            $('#error_nama').html(``)

            $('#kodekbk').removeClass('is-invalid');
            $('#error_kode').html(``)

        }

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');

        })

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

                    // Append new data to table
                    $('#data').append('<tr id="data' + response.data.id + '"><td>' +
                        response.data.id + '</td><td>' + response.data.nama +
                        '</td><td>' +
                        response.data.kodekbk + '</td><td>' + response.data.deskripsi +
                        '</td><td><button class="btn btn-primary editBtn" data-id="' +
                        response.data.id +
                        '">Edit</button> <button class="btn btn-danger deleteBtn" data-id="' +
                        response.data.id + '">Delete</button></td></tr>');

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').removeClass('d-none');
                    }, 3000);

                    location.reload();
                },
                error: function(errors) {
                    const error = errors.responseJSON.errors;
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
        // $('#addDataForm').on('submit', function(e) {
        //     e.preventDefault();
        // });

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('datakbk') }}/" + dataId + "/edit", function(response) {
                console.log(response)
                $('#editDataId').val(response.data.id);
                $('#editNama').val(response.data.nama);
                $('#editKodekbk').val(response.data.kodekbk);
                $('#editDeskripsi').val(response.data.deskripsi);
                $('#editModal').modal('show');
            });
        });

        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('datakbk') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#data' + response.data.id).html(
                        '<td>' + response.data.id + '</td>' +
                        '<td>' + response.data.kodekbk + '</td>' +
                        '<td>' + response.data.nama + '</td>' +
                        '<td>' + response.data.deskripsi + '</td>' +
                        '<td><button class="btn btn-primary editBtn" data-id="' +
                        response.data.id + '">Edit</button> ' +
                        '<button class="btn btn-danger deleteBtn" data-id="' + response
                        .data.id + '">Delete</button></td>'
                    );
                    alert('Data berhasil diupdate');
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            $('#edit' + key.charAt(0).toUpperCase() + key.slice(1))
                                .removeClass('is-invalid');
                            $('#edit' + key.charAt(0).toUpperCase() + key.slice(1) +
                                '-error').text(value[0]);
                        });
                    }
                }
            });
        });

        // Delete Data
        $(document).on('click', '.deleteBtn', function() {
            let dataId = $(this).data('id');
            if (confirm('Are you sure you want to delete this data?')) {
                $.ajax({
                    url: "{{ url('datakbk') }}/" + dataId,
                    method: 'DELETE',
                    success: function(res) {
                        console.log(res)
                        $('#data' + dataId).remove();
                        $('#success-alert').removeClass('d-none').text(
                            'Data berhasil dihapus!');

                        // Hide alert after 3 seconds
                        setTimeout(function() {
                            $('#success-alert').removeClass('d-none');
                        }, 3000);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Failed to delete data');
                    }
                });
            }
        });
    });
</script>
