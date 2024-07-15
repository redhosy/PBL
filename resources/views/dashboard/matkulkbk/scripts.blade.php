<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //selectotomatis
        $('#matkul_id').change(function() {
            var selectedMatkulId = $(this).val(); // Ambil nilai dari option yang dipilih
            var selectedMatkul = $(this).find('option:selected'); // Temukan option yang dipilih
            var kode_matakuliah = selectedMatkul.data('kode_matakuliah'); // Ambil nilai data-kode_matakuliah dari option yang dipilih
            var nama_matakuliah = selectedMatkul.data('nama_matakuliah'); // Ambil nilai data-nama_matakuliah dari option yang dipilih
            var semester = selectedMatkul.data('semester'); // Ambil nilai data-semester dari option yang dipilih
            var TP = selectedMatkul.data('tp'); // Ambil nilai data-TP dari option yang dipilih
            var sks = selectedMatkul.data('sks'); // Ambil nilai data-sks dari option yang dipilih

            // Setel nilai input dengan nilai yang diambil dari option yang dipilih
            $('#kode_matakuliah').val(kode_matakuliah);
            $('#nama_matakuliah').val(nama_matakuliah);
            $('#semester').val(semester);
            $('#tp').val(TP);
            $('#sks').val(sks);
        });



        //tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Add Data
        $('#modalAdd').on('click', function() {
            $('#addModal').modal('show');
        });

        $('#saveKbk').click(function() {
            $.ajax({
                url: "{{ route('matkulkbk.store') }}",
                type: "POST",
                data: $('#addPostForm').serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#success-alert').removeClass('d-none').text(
                        'Data berhasil ditambahkan!');
                    setTimeout(function() {
                        $('#success-alert').addClass('d-none');
                    }, 3000);
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    var errors = error.responseJSON.errors;
                    if (errors) {
                        $('#error_id_matkul').text(errors.id_matkul ? errors.id_matkul[0] : '');
                        $('#error_kbk').text(errors.kbk ? errors.kbk[0] : '');
                        $('#error_prodi').text(errors.prodi ? errors.prodi[0] : '');
                        $('#error_pengampu').text(errors.pengampu ? errors.pengampu[0] :'');
                    }
                }
            });
        });

        // Edit Data
        $(document).on('click', '.editBtn', function() {
            let dataId = $(this).data('id');
            $.get("{{ url('matkulkbk') }}/" + dataId + "/edit", function(response) {
                console.log(response);

                $('#editModal').modal('show');
                $('#editDataId').val(response.data.id);
                $('#edit_kode_matkul').val(response.data.matkul.kode_matakuliah);
                $('#edit_nama_matkul').val(response.data.matkul.nama_matakuliah);
                $('#edit_semester').val(response.data.matkul.semester);
                $('#edit_tp').val(response.data.matkul.TP);
                $('#edit_jumlah_sks').val(response.data.matkul.sks);
                $('#editmatkul_id').selectpicker('val', response.data.id_matkul);
                $('#edit_kbk').selectpicker('val', response.data.id_datakbk);
                $('#edit_prodi').selectpicker('val', response.data.id_prodi);
                $('#edit_pengampu').selectpicker('val', response.data.id_dosen);
            });
        });


        $('#editDataForm').on('submit', function(e) {
            e.preventDefault();
            console.log($('#editDataId').val());
            let dataId = $('#editDataId').val();
            let formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: "{{ url('matkulkbk') }}/" + dataId,
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

        // Detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');
            console.log("Button clicked, data ID:", itemId);

            $.get("{{ url('matkulkbk') }}/" + itemId, function(response) {
                console.log(response);

                // Menampilkan modal detail
                $('#detailModal').modal('show');

                // Mengisi data detail ke dalam modal
                $('#detailDataId').text(response.data[0].id);
                $('#detailKodeMatkul').text(response.data[0].matkul.kode_matakuliah);
                $('#detailNamaMatkul').text(response.data[0].matkul.nama_matakuliah);
                $('#detailSemester').text(response.data[0].matkul.semester);
                $('#detailTp').text(response.data[0].matkul.TP);
                $('#detailKbk').text(response.data[0].kbk.kodekbk);
                $('#detailProdi').text(response.data[0].prodi.prodi);
                $('#detailJumlahSks').text(response.data[0].matkul.sks);
                $('#detailPengampu').text(response.data[0].dosen.nama);
            }).fail(function(error) {
                console.error('Failed to fetch data');
                console.log(error);
            });
        });


        $('#dataTable').DataTable();
        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        //dropdownsearch
        $('.selectpicker select').selectpicker();


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
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Failed to delete data');
                }
            });
        });
    });
</script>
