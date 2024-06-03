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
            $('#Jumlahsks').removeClass('is-invalid');
            $('#error_Jumlahsks').html(``)

            $('#Nama').removeClass('is-invalid');
            $('#error_Nama').html(``)

            $('#KodeMatkul').removeClass('is-invalid');
            $('#error_KodeMatkul').html(``)

        }

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');

        })

        $('#saveKbk').on('click', function() {
            let formData = $('#addPostForm').serialize();
            $.ajax({
                url: "{{ url('matkulkbk') }}",
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');

                    // Append new data to table
                    $('#data').append('<tr id="data' + response.data.id + '"><td>' +
                        response.data.id + '</td><td>' + response.data.Nama +
                        '</td><td>' +
                        response.data.KodeMatkul + '</td><td>' + response.data.Jumlahsks +
                        '</td><td><button class="btn btn-primary editBtn" data-id="' +
                        response.data.id +
                        '">Edit</button> <button class="btn btn-danger deleteBtn" data-id="' +
                        response.data.id + '">Delete</button></td></tr>');

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').removeClass('d-none');
                    }, 4000);

                    location.reload();
                },
                error: function(errors) {
                    const error = errors.responseJSON.errors;
                    clearErrorMsg();
                    if (error.KodeMatkul) {
                        $('#KodeMatkul').addClass('is-invalid');
                        $('#error_KodeMatkul').html(
                            `<div class="text-danger">${error.KodeMatkul}</div>`)
                    }

                    if (error.Nama) {
                        $('#Nama').addClass('is-invalid');
                        $('#error_Nama').html(
                            `<div class="text-danger">${error.Nama}</div>`)
                    }

                    if (error.Jumlahsks) {
                        $('#Jumlahsks').addClass('is-invalid');
                        $('#error_Jumlahsks').html(
                            `<div class="text-danger">${error.Jumlahsks}</div>`)
                    }

                    console.log(errors)
                }
            });
        })


        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('matkulkbk') }}/" + dataId + "/edit", function(response) {
                console.log(response)
                $('#editDataId').val(response.data.id);
                $('#editKodeMatkul').val(response.data.KodeMatkul);
                $('#editNama').val(response.data.Nama);
                $('#editJumlahsks').val(response.data.Jumlahsks);
                $('#editModal').modal('show');
            });
        });

        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('matkulkbk') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#data' + response.data.id).html(
                        '<td>' + response.data.id + '</td>' +
                        '<td>' + response.data.KodeMatkul + '</td>' +
                        '<td>' + response.data.Nama + '</td>' +
                        '<td>' + response.data.Jumlahsks + '</td>' +
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
            $.get("{{ url('matkulkbk') }}/" + dataId, function(response) {
                console.log(response)
                $('#editDataId').text(response.data.id);
                $('#detailKodeMatkul').text(response.data.KodeMatkul);
                $('#detailNama').text(response.data.Nama);
                $('#detailJumlahsks').text(response.data.Jumlahsks);
                $('#detailModal').modal('show');
            });
        });

        // pencarian
        $(document).ready(function() {
            $('#searchButton').on('click', function() {
                var value = $('#searchInput').val().toLowerCase();
                $("#dataTable tr").filter(function() {
                    // Get the text content of the 'nama' and 'kodekbk' columns
                    var KodeMatkul = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var Nama = $(this).find('td:nth-child(3)').text().toLowerCase();

                    // Check if the search value matches either 'nama' or 'kodekbk'
                    $(this).toggle(Nama.indexOf(value) > -1 || KodeMatkul.indexOf(value) >
                        -1);
                });
            });
        });

        // Delete Data
        // $(document).on('click', '.deleteBtn', function() {
        //     let dataId = $(this).data('id');
        //     if (confirm('Are you sure you want to delete this data?')) {
        //         $.ajax({
        //             url: "{{ url('datakbk') }}/" + dataId,
        //             method: 'DELETE',
        //             success: function(res) {
        //                 console.log(res)
        //                 $('#data' + dataId).remove();
        //                 $('#success-alert').removeClass('d-none').text(
        //                     'Data berhasil dihapus!');

        //                 // Hide alert after 3 seconds
        //                 setTimeout(function() {
        //                     $('#success-alert').removeClass('d-none');
        //                 }, 30000);

        //                 location.reload();
        //             },
        //             error: function(xhr, status, error) {
        //                 console.log(xhr.responseText);
        //                 alert('Failed to delete data');
        //             }
        //         });
        //     }
        // });

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
                error: function(xhr, status, error){
                    console.log(xhr.responseText);
                    alert('Failed to delete data');
                }
            });
        });
    });
</script>
