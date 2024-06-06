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

                        // Hide alert after 3 seconds
                        setTimeout(function() {
                            $('#success-alert').removeClass('d-none');
                        }, 50000);
                        
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

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('datakbk') }}/" + dataId + "/edit", function(response) {
                console.log(response)
                $('#editDataId').val(response.data.id);
                $('#editKodekbk').val(response.data.kodekbk);
                $('#editNama').val(response.data.nama);
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


        //    detail
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
        $(document).ready(function() {
            $('#searchButton').on('click', function() {
                var value = $('#searchInput').val().toLowerCase();
                $("#dataTable tr").filter(function() {
                    // Get the text content of the 'nama' and 'kodekbk' columns
                    var kodekbk = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var nama = $(this).find('td:nth-child(3)').text().toLowerCase();

                    // Check if the search value matches either 'nama' or 'kodekbk'
                    $(this).toggle(nama.indexOf(value) > -1 || kodekbk.indexOf(value) >
                        -1);
                });
            });
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
                error: function(xhr, status, error){
                    console.log(xhr.responseText);
                    alert('Failed to delete data');
                }
            });
        });
    });
</script>
