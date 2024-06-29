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
        // function clearErrorMsg() {
        //     $('#jurusan').removeClass('is-invalid');
        //     $('#error_jurusan').html('');

        //     $('#jabpim').removeClass('is-invalid');
        //     $('#error_jabpim').html('');

        //     $('#nama').removeClass('is-invalid');
        //     $('#error_nama').html('');

        //     $('#periode').removeClass('is-invalid');
        //     $('#error_periode').html('');

        //     $('#status').removeClass('is-invalid');
        //     $('#error_status').html('');
        // }

        // Add Data
        // $('#modalAdd').on('click', function() {
        //     $('#addModal').modal('show');
        // });

        // $('#saveKbk').on('click', function() {
        //     let formData = $('#addPostForm').serialize();
        //     console.log('Sending data:', formData);
        //     $.ajax({
        //         url: "{{ url('dapinjur') }}",
        //         method: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             console.log(response);
        //             $('#addModal').modal('hide');
        //             $('#success-alert').removeClass('d-none').text(
        //                 'Data berhasil ditambahkan!');

        //             // Hide alert after 3 seconds
        //             setTimeout(function() {
        //                 $('#success-alert').addClass('d-none');
        //             }, 3000);

        //             location.reload();
        //         },
        //         error: function(errors) {
        //             console.log(errors);
        //             const error = errors.responseJSON.errors;
        //             clearErrorMsg();

        //             if (error.jurusan) {
        //                 $('#jurusan').addClass('is-invalid');
        //                 $('#error_jurusan').html(
        //                     `<div class="text-danger">${error.jurusan}</div>`);
        //             }

        //             if (error.nama) {
        //                 $('#nama').addClass('is-invalid');
        //                 $('#error_nama').html(
        //                     `<div class="text-danger">${error.nama}</div>`);
        //             }

        //             if (error.periode) {
        //                 $('#periode').addClass('is-invalid');
        //                 $('#error_periode').html(
        //                     `<div class="text-danger">${error.periode}</div>`);
        //             }

        //             if (error.jabpim) {
        //                 $('#jabpim').addClass('is-invalid');
        //                 $('#error_jabpim').html(
        //                     `<div class="text-danger">${error.jabpim}</div>`);
        //             }

        //             if (error.status) {
        //                 $('#status').addClass('is-invalid');
        //                 $('#error_status').html(
        //                     `<div class="text-danger">${error.status}</div>`);
        //             }
        //         }
        //     });
        // });

        // Edit Data
        // $(document).on('click', '.editBtn', function() {
        //     let dataId = $(this).data('id');
        //     $.get("{{ url('dapinjur') }}/" + dataId + "/edit", function(response) {
        //         console.log(response);
        //         $('#editDataId').val(response.data.id);
        //         $('#editjabpim').val(response.data.jabatan_pimpinan);
        //         $('#editnama').val(response.data.nama);
        //         $('#editjurusan').val(response.data.jurusan.jurusan);
        //         $('#editperiode').val(response.data.periode);
        //         $('#editstatus').val(response.data.status);
        //         $('#editModal').modal('show');
        //     });
        // });

        // $('#editDataForm').on('submit', function(e) {
        //     e.preventDefault();
        //     let dataId = $('#editDataId').val();
        //     let formData = $(this).serialize(); // Serialize form data
        //     $.ajax({
        //         url: "{{ url('dapinjur') }}/" + dataId,
        //         method: 'PUT',
        //         data: formData,
        //         success: function(response) {
        //             $('#editModal').modal('hide');
        //             $('#data' + response.data.id).html(
        //                 '<td>' + response.data.id + '</td>' +
        //                 '<td>' + response.data.jabatan_pimpinan + '</td>' +
        //                 '<td>' + response.data.jurusan.jurusan + '</td>' +
        //                 '<td>' + response.data.nama + '</td>' +
        //                 '<td>' + response.data.periode + '</td>' +
        //                 '<td>' + response.data.status + '</td>' +
        //                 '<td><button class="btn btn-primary editBtn" data-id="' +
        //                 response.data.id + '">Edit</button> ' +
        //                 '<button class="btn btn-danger deleteBtn" data-id="' + response
        //                 .data.id + '">Delete</button></td>'
        //             );
        //             alert('Data berhasil diupdate');
        //         },
        //         error: function(xhr) {
        //             let errors = xhr.responseJSON.errors;
        //             if (errors) {
        //                 $.each(errors, function(key, value) {
        //                     $('#edit' + key.charAt(0).toUpperCase() + key.slice(1))
        //                         .addClass('is-invalid');
        //                     $('#edit' + key.charAt(0).toUpperCase() + key.slice(1) +
        //                         '-error').text(value[0]);
        //                 });
        //             }
        //         }
        //     });
        // });

        // Detail Data
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');
            console.log("Button clicked, data ID:", itemId);
            $.get("{{ url('dapinjur') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                $('#editDataId').text(response.data.id);
                $('#detailjabatan').text(response.data.jabpim.jabatan_pimpinan);
                $('#detailnama').text(response.data.dosen.nama);
                $('#detailjurusan').text(response.data.jurusan.jurusan);
                $('#detailperiode').text(response.data.periode);
                $('#detailstatus').text(response.data.status);
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        //dropdownsearch
        // $('.selectpicker select').selectpicker();

        // Pencarian
        // $('#searchButton').on('click', function() {
        //     let value = $('#searchInput').val().toLowerCase();
        //     $("#dataTable tr").filter(function() {
        //         var jabatan_pimpinan = $(this).find('td:nth-child(2)').text().toLowerCase();
        //         var nama = $(this).find('td:nth-child(3)').text().toLowerCase();
        //         $(this).toggle(jabatan_pimpinan.indexOf(value) > -1 || nama.indexOf(value) > -
        //         1);
        //     });
        // });
        $('#dataTable').DataTable();

        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Delete Data
        // $(document).on('click', '.deleteBtn', function() {
        //     let dataId = $(this).data('id');
        //     $('#modalDelete').modal('show');
        //     $('#confirmDelete').data('id', dataId);
        // });

        // Confirm deletion
        // $('#confirmDelete').click(function() {
        //     var dataId = $(this).data('id');
        //     $.ajax({
        //         url: "{{ url('dapinjur') }}/" + dataId,
        //         method: 'DELETE',
        //         success: function(res) {
        //             console.log(res);
        //             $('#data' + dataId).remove();
        //             $('#modalDelete').modal('hide');
        //             $('#success-alert').removeClass('d-none').text(
        //                 'Data berhasil dihapus!');

        //             // Hide alert after 3 seconds
        //             setTimeout(function() {
        //                 $('#success-alert').addClass('d-none');
        //             }, 3000);
        //         },
        //         error: function(xhr, status, error) {
        //             console.log(xhr.responseText);
        //             alert('Failed to delete data');
        //         }
        //     });
        // });
    });
</script>
