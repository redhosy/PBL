<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Tooltip
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
                url: "{{ route('RPS.store') }}",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
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
                        $('#error_dosen_pengembang').text(errors.dosen_pengembang ? errors
                            .dosen_pengembang[0] : '');
                        $('#error_kode_matkul').text(errors.kode_matkul ? errors
                            .kode_matkul[0] : '');
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
            $.get("/RPS/" + dataId + "/edit", function(response) {
                console.log(response);
                $('#editDataId').val(response.data.id);
                $('#editkoderps').val(response.data.KodeRPS);
                $('#editdosen_pengembang').selectpicker('val', response.data.id_dosen);
                $('#editkode_matkul').selectpicker('val', response.data.id_KodeMatkul);
                $('.dokumen_preview').html(
                    `<a class="btn btn-primary mb-2" href="/storage/dokumen/${response.data.Dokumen}" target="_blank">View Dokumen</a>`
                );
                $('#edittanggal').val(response.data.Tanggal);
                $('#editthnakd').selectpicker('val', response.data.id_smt_thn_akd);
                $('#editModal').modal('show');
            });
        });

        $('#editPostForm').on('submit', function(e) {
            e.preventDefault();
            let dataId = $('#editDataId').val();
            var data = new FormData();
            data.append('_method', 'PUT');
            data.append('editkoderps', $('#editkoderps').val());
            data.append('dosen_pengembang', $('#editdosen_pengembang').val());
            data.append('kode_matkul', $('#editkode_matkul').val());
            data.append('dokumen', $('#editdokumen')[0].files[0]);
            data.append('edittanggal', $('#edittanggal').val());
            data.append('thnakd', $('#editthnakd').val());

            $.ajax({
                url: "/RPS/" + dataId,
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil diUpdate!'
                    );

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

        // Pencarian
        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Dropdownsearch
        $('.selectpicker select').selectpicker();

        // Detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');
            console.log("Button clicked, data ID:", itemId);

            $.get("{{ url('RPS') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                $('#detailkoderps').text(response.data[0].KodeRPS);
                $('#detaildosen_pengembang').text(response.data[0].dosen.nama);
                $('#detailkode_matkul').text(response.data[0].kode_matkul.nama_matakuliah);
                $('#detaildokumen').html(
                    `<a href="/storage/dokumen/${response.data[0].Dokumen}" target="_blank" class="btn btn-primary">View Dokumen</a>`
                );
                $('#detailtanggal').text(response.data[0].Tanggal);
                $('#detailthnakd').text(response.data[0].thnakd.smt_thn_akd);
            }).fail(function(error) {
                console.error('Failed to fetch data');
                console.log(error);
            });
        });

        // Hapus Data
        $(document).on('click', '.deleteBtn', function() {
            let dataId = $(this).data('id');
            $('#modalDelete').modal('show');
            $('#confirmDelete').data('id', dataId);
        });

        // Confirm deletion
        $('#confirmDelete').click(function() {
            var dataId = $(this).data('id');
            $.ajax({
                url: "{{ url('RPS') }}/" + dataId,
                method: 'DELETE',
                success: function(res) {
                    console.log(res);
                    $('#data' + dataId).remove();
                    $('#modalDelete').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil dihapus!'
                    );

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

        // Approve RPS
        $(document).on('click', '.approve', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('rps.approve') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        // Menghapus kelas d-none dari label 'Terverifikasi' untuk menampilkannya
                        $('#status_' + id).removeClass('d-none');

                        // Menyembunyikan tombol 'Approve' yang terkait
                        $('#data' + id).find('.approve').hide();

                    } else {
                        alert('Failed to verify the document.');
                    }
                },
                error: function() {
                    alert('Error processing request.');
                }
            });
            // $('#status_').removeClass('d-none');
        });
    });
</script>
