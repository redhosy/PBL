
<script>
$(document).ready(function() {
    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function clearErrorMsg() {
        $('#kodesoal').removeClass('is-invalid');
        $('#error_kodesoal').html('');

        $('#kode_matkul').removeClass('is-invalid');
        $('#error_kode_matkul').html('');

        $('#tahunakademik').removeClass('is-invalid');
        $('#error_tahunakademik').html('');

        $('#dokumen').removeClass('is-invalid');
        $('#error_dokumen').html('');

        $('#dosen').removeClass('is-invalid');
        $('#error_dosen').html('');
    }

    // Show modal
    $('#modalAdd').on('click', function() {
        $('#addModal').modal('show');
    });

    // Save form data
    $('#saveRps').on('click', function() {
        let form = $('#addPostForm')[0];
        let formData = new FormData(form); // Use FormData to handle file upload

        $.ajax({
            url: "{{ url('RPS') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $('#addModal').modal('hide');
                $('#success-alert').removeClass('d-none').text('Data berhasil ditambahkan!');

                // Hide alert after 3 seconds
                setTimeout(function() {
                    $('#success-alert').addClass('d-none');
                }, 3000);

                // Optionally reload the page or refresh the data table
                location.reload();
            },
            error: function(errors) {
                console.log(errors);
                const error = errors.responseJSON.errors;
                clearErrorMsg();

                if (error.koderps) {
                    $('#kodesoal').addClass('is-invalid');
                    $('#error_kodesoal').html(`<div class="text-danger">${error.kodesoal}</div>`);
                }

                if (error.kode_matkul) {
                    $('#kode_matkul').addClass('is-invalid');
                    $('#error_kode_matkul').html(`<div class="text-danger">${error.kode_matkul}</div>`);
                }

                if (error.tahunakademik) {
                    $('#tahunakademik').addClass('is-invalid');
                    $('#error_tahunakademik').html(`<div class="text-danger">${error.tahuakademik}</div>`);
                }

                if (error.dokumen) {
                    $('#dokumen').addClass('is-invalid');
                    $('#error_dokumen').html(`<div class="text-danger">${error.dokumen}</div>`);
                }

                if (error.dosen) {
                    $('#dosen').addClass('is-invalid');
                    $('#error_dosen').html(`<div class="text-danger">${error.dosen}</div>`);
                }
            }
        });
    });

    // Clear form and reset modal on close
    $('#addModal').on('hidden.bs.modal', function() {
        clearErrorMsg();
        $('#addPostForm')[0].reset();
    });

    // Other JavaScript functionalities (Edit, Detail, Search, Delete)...
    // Your other code for edit, detail, search, and delete functions goes here.
});
</script>
