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

        // Pencarian
        $('#dataTable').DataTable();

        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Clear error messages
        //  function clearErrorMsg() {
        //     $('#jurusan').removeClass('is-invalid');
        //     $('#error_jurusan').html('');

        //     $('#nama').removeClass('is-invalid');
        //     $('#error_nama').html('');

        //     $('#nidn').removeClass('is-invalid');
        //     $('#error_nidn').html('');

        //     $('#nip').removeClass('is-invalid');
        //     $('#error_nip').html('');

        //     $('#email').removeClass('is-invalid');
        //     $('#error_email').html('');

        //     $('#gender').removeClass('is-invalid');
        //     $('#error_gender').html('');

        //     $('#prodi').removeClass('is-invalid');
        //     $('#error_prodi').html('');

        //     $('#status').removeClass('is-invalid');
        //     $('#error_status').html('');
        // }

        // Add Data
        //  $('#modalAdd').on('click', function() {
        //     $('#addModal').modal('show');
        // });

        // $('#saveKbk').on('click', function() {
        //     let formData = $('#addPostForm').serialize();
        //     console.log('Sending data:', formData);
        //     $.ajax({
        //         url: "{{ url('dados') }}",
        //         method: 'POST',
        //         data: formData,
        //         success: function(response) {
        //             console.log(response);
        //             $('#addModal').modal('hide');
        //             $('#success-alert').removeClass('d-none').text('Data berhasil ditambahkan!');

        //             // Hide alert after 3 seconds
        //             setTimeout(function() {
        //                 $('#success-alert').addClass('d-none');
        //             }, 3000);

        //             location.reload();
        //         },
        //         error: function(errors) {
        //             console.log(errors)
        //             const error = errors.responseJSON.errors;
        //             clearErrorMsg();

        //             if (error.jurusan) {
        //                 $('#jurusan').addClass('is-invalid');
        //                 $('#error_jurusan').html(`<div class="text-danger">${error.jurusan}</div>`);
        //             }

        //             if (error.nama) {
        //                 $('#nama').addClass('is-invalid');
        //                 $('#error_nama').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }

        //             if (error.nidn) {
        //                 $('#nidn').addClass('is-invalid');
        //                 $('#error_nidn').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }

        //             if (error.nip) {
        //                 $('#nip').addClass('is-invalid');
        //                 $('#error_nip').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }

        //             if (error.email) {
        //                 $('#email').addClass('is-invalid');
        //                 $('#error_email').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }

        //             if (error.gender) {
        //                 $('#gender').addClass('is-invalid');
        //                 $('#error_gender').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }

        //             if (error.prodi) {
        //                 $('#prodi').addClass('is-invalid');
        //                 $('#error_prodi').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }

        //             if (error.status) {
        //                 $('#status').addClass('is-invalid');
        //                 $('#error_status').html(`<div class="text-danger">${error.kodejurusan}</div>`);
        //             }
        //             console.log(errors);
        //         }
        //     })
        // });

        // Edit Data
        // $(document).on('click', '.editBtn', function() {
        //     let dataId = $(this).data('id');
        //     $.get("{{ url('dados') }}/" + dataId + "/edit", function(response) {
        //         console.log(response);
        //         $('#editDataId').val(response.data.id);
        //         $('#editnama').val(response.data.nama);
        //         $('#editnidn').val(response.data.nidn);
        //         $('#editnip').val(response.data.nip);
        //         $('#editemail').val(response.data.email);
        //         $('#editgender').val(response.data.gender);
        //         $('#editjurusan').val(response.data.jurusan);
        //         $('#editprodi').val(response.data.prodi);
        //         $('#editgambar').val(response.data.image);
        //         $('#editstatus').val(response.data.status);
        //         $('#editModal').modal('show');
        //     });
        // });

        // $('#editDataForm').on('submit', function(e) {
        //     e.preventDefault();
        //     let dataId = $('#editDataId').val();
        //     let formData = $(this).serialize(); // Serialize form data
        //     $.ajax({
        //         url: "{{ url('dajur') }}/" + dataId,
        //         method: 'PUT',
        //         data: formData,
        //         success: function(response) {
        //             $('#editModal').modal('hide');
        //             $('#data' + response.data.id).html(
        //                 '<td>' + response.data.id + '</td>' +
        //                 '<td>' + response.data.nama + '</td>' +
        //                 '<td>' + response.data.nidn + '</td>' +
        //                 '<td>' + response.data.nip + '</td>' +
        //                 '<td>' + response.data.email + '</td>' +
        //                 '<td>' + response.data.gender + '</td>' +
        //                 '<td>' + response.data.prodi + '</td>' +
        //                 '<td>' + response.data.jurusan + '</td>' +
        //                 '<td>' + response.data.status + '</td>' +
        //                 '<td><button class="btn btn-primary editBtn" data-id="' + response.data.id + '">Edit</button> ' +
        //                 '<button class="btn btn-danger deleteBtn" data-id="' + response.data.id + '">Delete</button></td>'
        //             );
        //             alert('Data berhasil diupdate');
        //         },
        //         error: function(xhr) {
        //             let errors = xhr.responseJSON.errors;
        //             if (errors) {
        //                 $.each(errors, function(key, value) {
        //                     $('#edit' + key.charAt(0).toUpperCase() + key.slice(1)).addClass('is-invalid');
        //                     $('#edit' + key.charAt(0).toUpperCase() + key.slice(1) + '-error').text(value[0]);
        //                 });
        //             }
        //         }
        //     });
        // });


        // detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');

            console.log("Button clicked, data ID:", itemId);

            $.get("{{ url('dados') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                $('#editDataId').text(response.data.id);
                $('#detailnama').text(response.data.nama);
                $('#detailnidn').text(response.data.nidn);
                $('#detailnip').text(response.data.nip);
                $('#detailgender').text(response.data.gender == 1 ? 'Laki-Laki' : 'Perempuan');
                $('#detailjur').text(response.data.jurusan.jurusan);
                $('#detailprod').text(response.data.prodi.prodi);
                $('#detailemail').text(response.data.email);
                $('#detailimage').text(response.data.image);
                $('#detailstatus').text(response.data.status);
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Event listener untuk tombol detail
        // $('#dataTable tbody').on('click', 'button.btn-info', function() {
        //     var tr = $(this).closest('tr');
        //     var row = table.row(tr);
        //     var data = row.data();

        //     // Menampilkan modal dan mengisi dengan data detail
        //     $('#detailModal').modal('show');
        //     $('#editDataId').text(data.id);
        //     $('#detailnama').text(data.nama);
        //     $('#detailnidn').text(data.nidn);
        //     $('#detailnip').text(data.nip);
        //     $('#detailgender').text(data.gender == 1 ? 'Laki-Laki' : 'Perempuan');
        //     $('#detailjur').text(data.jurusan);
        //     $('#detailprod').text(data.prodi);
        //     $('#detailemail').text(data.email);
        //     // $('#detailimage').text(data.image);
        //     // $('#detailstatus').text(data.status);
        // });



        // $('#dataTable').DataTable({
        //     "processing": true,
        //     "paging": true,
        //     "searching": true,
        //     "responsive": true,
        //     "language": {
        //         "search": "cari"
        //     },
        //     "ajax": {
        //         "url": "getDosen", // Ganti dengan URL endpoint Anda
        //         "type": "GET"
        //     },
        //     "columns": [{
        //             "data": null,
        //             "render": function(_data, _type, _row, meta) {
        //                 return meta.row + 1; // Nomor urut otomatis berdasarkan posisi baris
        //             },
        //             "orderable": false
        //         },
        //         {
        //             "data": "nip",
        //             "orderable": true
        //         },
        //         {
        //             "data": "nama",
        //             "orderable": true
        //         },
        //         {
        //             "data": "nidn",
        //             "orderable": true
        //         },
        //         {
        //             "data": "gender",
        //             "orderable": true
        //         },
        //         {
        //             "data": "email",
        //             "orderable": true
        //         },
        //         {
        //             "data": "jurusan",
        //             "orderable": true
        //         },
        //         {
        //             "data": "kode_jurusan",
        //             "orderable": true
        //         },
        //         {
        //             "data": "kode_prodi",
        //             "orderable": true
        //         },
        //         {
        //             "data": "prodi",
        //             "orderable": true
        //         },
        //         {

        //             "data": null,
        //             "defaultContent": '<button class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></button>',
        //             "orderable": false
        //         }
        //     ]
        // });

        // $('#searchButton').on('click', function() {
        //     var value = $('#searchInput').val().toLowerCase();
        //     $("#dataTable tr").filter(function() {
        //         // Get the text content of the 'nama' and 'kodekbk' columns
        //         var nama = $(this).find('td:nth-child(2)').text().toLowerCase();
        //         var nip = $(this).find('td:nth-child(3)').text().toLowerCase();

        //         // Check if the search value matches either 'nama' or 'kodekbk'
        //         $(this).toggle(nama.indexOf(value) > -1 || nip.indexOf(value) >
        //                 -1);
        //     });
        // });

        // Delete
        // $(document).on('click', '.deleteBtn', function() {
        //     // alert('lll')
        //     let dataId = $(this).data('id');
        //     $('#modalDelete').modal('show');
        //     $('#confirmDelete').data('id', dataId);
        // });

        // Confirm deletion
        // $('#confirmDelete').click(function() {
        //     var dataId = $(this).data('id');
        //     $.ajax({
        //         url: "{{ url('dados') }}/" + dataId,
        //         method: 'DELETE',
        //         success: function(res) {
        //             console.log(res);
        //             $('#data' + dataId).remove();
        //             $('#modalDelete').modal('hide');
        //             $('#success-alert').removeClass('d-none').text('Data berhasil dihapus!');

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
