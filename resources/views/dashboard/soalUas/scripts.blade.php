<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //tooltip
        $('[data-toggle="tooltip"]').tooltip();


        // Show modal
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');
        });

        // Save form data
        $('#saveSoal').click(function() {
            $.ajax({
                url: "{{ route('soalUas.store') }}",
                type: "POST",
                data: $('#addPostForm').serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_kodesoal').text(errors.kodesoal ? errors.kodesoal[0] : '');
                        $('#error_dosen_pengampu').text(errors.dosen_pengembang ? errors.dosen_pengembang[0] : '');
                        $('#error_kode_matkul').text(errors.kode_matkul ? errors.kode_matkul[0] : '');
                        $('#error_dokumen').text(errors.dokumen ? errors.dokumen[0] : '');
                        $('#error_tanggal').text(errors.tanggal ? errors.tanggal[0] : '');
                        $('#error_thnakd').text(errors.thnakd ? errors.thnakd[0] : '');
                    }
                }
            });
        });

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('soalUas') }}/" + dataId + "/edit", function(response) {
                $('#editkodesoal').val(response.data.kodeSoal);
                $('#editdosen_pengampu').val(response.data.dosen_pengembang);
                $('#editkode_matkul').val(response.data.kode_matkul);
                $('#editdokumen').val(response.data.dokumen);
                $('#edittanggal').val(response.data.tanggal);
                $('#editthnakd').val(response.data.thnakd);
                $('#editModal').modal('show');
            });
        });

        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            console.log($('#editDataId').val());
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('soalUas') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil diUpdate! '
                    );

                    // Hide alert after 3 seconds
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);

                    location.reload();

                },
                error: function(xhr) {
                    console.log(xhr);
                    let errors = xhr.responseJSON.errors;
                }
            });
        });

        // pencarian
        $('#dataTable').DataTable();
        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        //dropdownsearch
        $('.selectpicker select').selectpicker();

        // Detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');
            console.log("Button clicked, data ID:", itemId);

            $.get("{{ url('soalUas') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                $('#detailsoal').text(response.data[0].kodeSoal);
                $('#detaildosen_Pengampu').text(response[0].data.dosen.nama);
                $('#detailkode_matkul').text(response.data[0].kode_matkul.nama_matakuliah);
                $('#detaildokumen').text(response.data[0].dokumen);
                $('#detailtanggal').text(response.data[0].tanggal);
                $('#detailthnakd').text(response.data[0].thnakd.smt_thn_akd);
            }).fail(function(error) {
                console.error('Failed to fetch data');
                console.log(error);
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
                url: "{{ url('soalUas') }}/" + dataId,
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
