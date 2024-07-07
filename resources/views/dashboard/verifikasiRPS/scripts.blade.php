
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
        $('#saveRps').click(function() {
            var data = new FormData();
            data.append('koderps', $('#koderps').val());
            data.append('dosen_pengembang', $('#dosen_pengembang').val());
            data.append('kode_matkul', $('#kode_matkul').val());
            data.append('dokumen', $('#dokumen')[0].files[0]);
            data.append('tanggal', $('#tanggal').val());
            data.append('thnakd', $('#thnakd').val());

            $.ajax({
                url: "{{ route('verifikasiRPS.store') }}",
                type: "POST",
                data: data,
                processData : false,
                contentType : false,
                success: function(response) {
                    console.log(response);
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 5000);

                   location.reload();

                    $('#addUserForm')[0].reset();
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_koderps').text(errors.koderps ? errors.koderps[0] : '');
                        $('#error_dosen_pengembang').text(errors.dosen_pengembang ? errors.dosen_pengembang[0] : '');
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
            $.get("/verifikasiRPS/" + dataId + "/edit", function(response) {
                console.log(response)
                $('#editkoderps').val(response.data.KodeRPS);
                $('#editdosen_pengembang').selectpicker('val',response.data.id_dosen);
                $('#editkode_matkul').selectpicker('val', response.data.id_KodeMatkul);
                $('.dokumen_preview').html(`<a class="btn btn-primary mb-2" href="/storage/dokumen/${response.data.Dokumen}" target="_blank">View Dokumen</a>`);
                $('#edittanggal').val(response.data.Tanggal);
                $('#editthnakd').selectpicker('val', response.data.id_smt_thn_akd);
                $('#editModal').modal('show');
            });
        });

        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            console.log($('#editDataId').val());
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('verifikasiRPS') }}/" + dataId,
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

            $.get("{{ url('verifikasiRPS') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                $('#detailkoderps').text(response.data[0].KodeRPS);
                $('#detaildosen_pengembang').text(response.data[0].dosen.nama);
                $('#detailkode_matkul').text(response.data[0].kode_matkul.nama_matakuliah);
                $('#detaildokumen').html(`<a href="/storage/dokumen/${response.data[0].Dokumen}" target="_blank" class="btn btn-primary">View Dokumen</a>`);
                $('#detailtanggal').text(response.data[0].Tanggal);
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
                url: "{{ url('verifikasiRPS') }}/" + dataId,
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
