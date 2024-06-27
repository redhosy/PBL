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

        // Save new data
        $('#saveBeritaAcara').click(function() {
            $.ajax({
                url: "{{ route('verifikasiSoal.store') }}",
                type: "POST",
                data: $('#addPostForm').serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);
                    location.reload(); // Reload halaman untuk menampilkan perubahan
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_semester').text(errors.semester ? errors.semester[0] :
                            '');
                        $('#error_matakuliah').text(errors.matakuliah ? errors.matakuliah[
                            0] : '');
                        $('#error_validasiisi').text(errors.validasiisi ? errors
                            .validasiisi[0] :
                            '');
                        $('#error_ruang').text(errors.ruang ? errors.ruang[0] : '');
                        $('#error_tanggal').text(errors.tanggal ? errors.tanggal[0] : '');
                    }
                }
            });
        });


        // Show Edit Modal
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('verifikasiSoal') }}/" + dataId + "/edit", function(response) {
                $('#editDataId').val(response.data.id);
                $('#edit_semester').val(response.data.semester);
                $('#edit_matakuliah').val(response.data.matakuliah.nama_matakuliah);
                $('#edit_validasiisi').val(response.data.validasi_isi);
                $('#editruang').val(response.data.ruang);
                $('#edittanggal').val(response.data.tanggal);
                $('#editModal').modal('show');
            });
        });

        // Update Data
        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('verifikasiSoal') }}/" + dataId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil diperbarui.');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 3000);
                    location.reload();
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    console.log(errors);
                }
            });
        });

        // pencarian
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Initialize DataTables
        $('#dataTable1').DataTable();


        //dropdownsearch
        $('.selectpicker select').selectpicker();

        // Detail
        // $(document).on('click', '.detailBtn', function() {
        //     let itemId = $(this).data('id');
        //     console.log("Button clicked, data ID:", itemId);

        //     $.get("{{ url('soalUas') }}/" + itemId, function(response) {
        //         console.log(response);
        //         $('#detailModal').modal('show');
        //         $('#detailsoal').text(response.data[0].kodeSoal);
        //         $('#detaildosen_Pengampu').text(response[0].data.dosen.nama);
        //         $('#detailkode_matkul').text(response.data[0].kode_matkul.nama_matakuliah);
        //         $('#detaildokumen').text(response.data[0].dokumen);
        //         $('#detailtanggal').text(response.data[0].tanggal);
        //         $('#detailthnakd').text(response.data[0].thnakd.smt_thn_akd);
        //     }).fail(function(error) {
        //         console.error('Failed to fetch data');
        //         console.log(error);
        //     });
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

        // Filter by tanggal
        $('#filterTanggal').on('change', function() {
            var selectedDate = $(this).val();
            var table = $('#dataTable1').DataTable();
            table.column(4).search(selectedDate).draw();
        });

        // Print
        $('#cetakBeritaAcara').on('click', function() {
            var selectedDate = $('#filterTanggal').val();
            window.location.href = "/verifikasiRPS/cetak?tanggal=" + selectedDate;
        });
    });
</script>
