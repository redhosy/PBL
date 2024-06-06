<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function clearErrorMsg() {
            $('#status').removeClass('is-invalid');
            $('#error_status').html(``)

            $('#email').removeClass('is-invalid');
            $('#error_email').html(``)

            $('#prodi').removeClass('is-invalid');
            $('#error_prodi').html(``)

            $('#jurusan').removeClass('is-invalid');
            $('#error_jurusan').html(``)

            $('#nama').removeClass('is-invalid');
            $('#error_nama').html(``)

            $('#nip').removeClass('is-invalid');
            $('#error_nip').html(``)

        }

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');

        })

        $('#saveKbk').on('click', function() {
            let formData = $('#addPostForm').serialize();
            $.ajax({
                url: "{{ url('dosenkbk') }}",
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');

                
                    // Hide alert after 3 seconds
                    if(response.status == 200){
                        setTimeout(function() {
                            $('#success-alert').addClass('d-none');
                        }, 3000);
                        location.reload();
                    }

                },
                error: function(errors) {
                    console.log(errors)
                    const error = errors.responseJSON.errors;
                    clearErrorMsg();
                    if (error.status) {
                        $('#status').addClass('is-invalid');
                        $('#error_status').html(
                            `<div class="text-danger">${error.status}</div>`)
                    }

                    if (error.prodi) {
                        $('#prodi').addClass('is-invalid');
                        $('#error_prodi').html(
                            `<div class="text-danger">${error.prodi}</div>`)
                    }

                    if (error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('#error_jurusan').html(
                            `<div class="text-danger">${error.jurusan}</div>`)
                    }

                    if (error.email) {
                        $('#email').addClass('is-invalid');
                        $('#error_email').html(
                            `<div class="text-danger">${error.email}</div>`)
                    }

                    if (error.nama) {
                        $('#nama').addClass('is-invalid');
                        $('#error_nama').html(
                            `<div class="text-danger">${error.nama}</div>`)
                    }

                    if (error.nip) {
                        $('#nip').addClass('is-invalid');
                        $('#error_nip').html(
                            `<div class="text-danger">${error.nip}</div>`)
                    }
                    console.log(errors)
                }
            });
        })

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('dosenkbk') }}/" + dataId + "/edit", function(response) {
                console.log(response)
                $('#editDataId').val(response.data.id);
                $('#editnip').val(response.data.nip);
                $('#editnama').val(response.data.nama);
                $('#editemail').val(response.data.email);
                $('#editjurusan').val(response.data.jurusan);
                $('#editprodi').val(response.data.prodi);
                $('#editstatus').val(response.data.status);
                $('#editModal').modal('show');
            });
        });

        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('dosenkbk') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#data' + response.data.id).html(
                        '<td>' + response.data.id + '</td>' +
                        '<td>' + response.data.nip + '</td>' +
                        '<td>' + response.data.nama + '</td>' +
                        '<td>' + response.data.email + '</td>' +
                        '<td>' + response.data.jurusan + '</td>' +
                        '<td>' + response.data.prodi + '</td>' +
                        '<td>' + response.data.status + '</td>' +
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

        //detail
        $(document).on('click', '.detailBtn', function() {
            let dataId = $(this).data('id');
            console.log("Button clicked, data ID:", dataId);
            $.get("{{ url('dosenkbk') }}/" + dataId, function(response) {
                console.log(response)
                $('#editDataId').text(response.data.id);
                $('#detailnip').text(response.data.nip);
                $('#detailNama').text(response.data.nama);
                $('#detailemail').text(response.data.email);
                $('#detailjurusan').text(response.data.jurusan);
                $('#detailprodi').text(response.data.prodi);
                $('#detailstatus').text(response.data.status);
                $('#detailModal').modal('show');
            });
        });

         // pencarian
         $(document).ready(function() {
            $('#searchButton').on('click', function() {
                var value = $('#searchInput').val().toLowerCase();
                $("#dataTable tr").filter(function() {
                    // Get the text content of the 'nama' and 'kodekbk' columns
                    var nip = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var nama = $(this).find('td:nth-child(3)').text().toLowerCase();

                    // Check if the search value matches either 'nama' or 'kodekbk'
                    $(this).toggle(nama.indexOf(value) > -1 || nip.indexOf(value) >
                        -1);
                });
            });
        });


        $(document).on('click', '.deleteBtn', function() {
            let dataId = $(this).data('id');
            $('#modalDelete').modal('show');
            $('#confirmDelete').data('id', dataId);
        });

        $('#confirmDelete').click(function() {
            var dataId = $(this).data('id');
            console.log(dataId)
            $.ajax({
                url: "{{ url('dosenkbk') }}/" + dataId,
                type: 'DELETE',
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
                error: function(xhr, status, error){
                    console.log(xhr.responseText);
                    alert('Failed to delete data');
                }
            });
        });
    });
</script>
