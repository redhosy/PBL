 <script>
     $(document).ready(function() {
         // Setup CSRF token for AJAX requests
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         //selectotomatis
         $('#dosen_id').change(function() {
             var selectedDosenId = $(this).val(); // Ambil nilai dari option yang dipilih
             var selectedDosen = $(this).find('option:selected'); // Temukan option yang dipilih
             var nama = selectedDosen.data('nama'); // Ambil nilai data-nama dari option yang dipilih
             var nip = selectedDosen.data('nip'); // Ambil nilai data-nip dari option yang dipilih
             var email = selectedDosen.data('email'); // Ambil nilai data-email dari option yang dipilih
             var prodi = selectedDosen.data('prodi'); // Ambil nilai data-email dari option yang dipilih
             var jurusan = selectedDosen.data(
                 'jurusan'); // Ambil nilai data-email dari option yang dipilih

             // Setel nilai input dengan nilai yang diambil dari option yang dipilih
             $('#nama').val(nama);
             $('#nip').val(nip);
             $('#email').val(email);
             $('#prodi').val(prodi);
             $('#jurusan').val(jurusan);
         });

         //tooltip
         $('[data-toggle="tooltip"]').tooltip();

         // Add Data
         $('#modalAdd').on('click', function() {
             $('#addModal').modal('show');
         });

         $('#saveKbk').click(function() {
             $.ajax({
                 url: "{{ route('dosenkbk.store') }}",
                 type: "POST",
                 data: $('#addPostForm').serialize(),
                 success: function(response) {
                     $('#addModal').modal('hide');
                     $('#success-alert').removeClass('d-none').text(
                         'Data berhasil ditambahkan!');
                     setTimeout(function() {
                         $('#success-alert').addClass('d-none');
                     }, 5000);
                     $('#addPostForm').trigger('reset');

                     location.reload(); // Reload halaman untuk menampilkan perubahan
                 },
                 error: function(error) {
                     console.log(error);
                     var errors = error.responseJSON.errors;
                     if (errors) {
                         $('#error_nama').text(errors.nama ? errors.nama[0] : '');
                         $('#error_nip').text(errors.nip ? errors.nip[0] : '');
                         $('#error_email').text(errors.email ? errors.email[0] : '');
                         $('#error_jurusan').text(errors.jurusan ? errors.jurusan[0] : '');
                         $('#error_prodi').text(errors.prodi ? errors.prodi[0] : '');
                         $('#error_kbk').text(errors.kbk ? errors.kbk[0] : '');
                         $('#error_jabatan').text(errors.jabatan ? errors.jabatan[0] : '');
                         $('#error_status').text(errors.status ? errors.status[0] : '');
                     }
                 }
             });
         });


         // Edit Data
         $(document).on('click', '.editBtn', function() {
             let dataId = $(this).data('id');
             $.get("{{ url('dosenkbk') }}/" + dataId + "/edit", function(response) {
                 $('#editModal').modal('show');
                 $('#editDataId').val(response.data.id);
                 $('#editnama').val(response.data.nama);
                 $('#editnip').val(response.data.nip);
                 $('#editemail').val(response.data.email);
                 $('#editprodi').val(response.data.prodi.prodi);
                 $('#editjurusan').val(response.data.jurusan.jurusan);
                 $('#editdosen').selectpicker('val', response.data.id_dosen);
                 $('#editkbk').selectpicker('val', response.data.id_datakbk);
                 $('#editjabatan').selectpicker('val', response.data.id_jabatan);
                 $('#editstatus').selectpicker('val', response.data.status);
             });
         });

         // Form submit for update
         $('#editPostForm').on('submit', function(e) {
             e.preventDefault();
             let dataId = $('#editDataId').val();
             let formData = $(this).serialize(); // Serialize form data
             $.ajax({
                 url: "{{ url('dosenkbk') }}/" + dataId,
                 method: 'PUT', // Menggunakan metode PUT untuk update
                 data: formData,
                 success: function(response) {
                     console.log(response)
                     $('#editModal').modal('hide');
                     $('#success-alert').removeClass('d-none').text(
                         'Data berhasil diperbarui.');

                     // Hide alert after 3 seconds
                     setTimeout(function() {
                         $('#success-alert').addClass('d-none');
                     }, 3000);

                     location.reload();
                 },
                 error: function(xhr) {
                     console.log(xhr)
                     let errors = xhr.responseJSON.errors;
                     console.log(errors); // Handle errors appropriately
                 }
             });
         });



         // Detail
         $(document).on('click', '.detailBtn', function() {
             let itemId = $(this).data('id');
             console.log("Button clicked, data ID:", itemId);

             $.get("{{ url('dosenkbk') }}/" + itemId, function(response) {
                 console.log(response);

                 // Menampilkan modal detail
                 $('#detailModal').modal('show');

                 // Mengisi data detail ke dalam modal
                 $('#detailDataId').text(response.data[0].id);
                 $('#detailnama').text(response.data[0].dosen.nama);
                 $('#detailemail').text(response.data[0].dosen.email);
                 $('#detailnip').text(response.data[0].dosen.nip);
                 $('#detailjurusan').text(response.data[0].jurusan.jurusan);
                 $('#detailprodi').text(response.data[0].prodi.prodi);
                 $('#detailkbk').text(response.data[0].kbk.kodekbk);
                 $('#detailjabatan').text(response.data[0].jabatan.jabatan_pimpinan);
                 $('#detailstatus').html(
                     '<span class="badge rounded-pill ' +
                     (response.data[0].status == 0 ? 'bg-danger text-white' :
                         'bg-success text-white') +
                     '">' +
                     (response.data[0].status == 0 ? 'Tidak Aktif' : 'Aktif') +
                     '</span>'
                 );
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
                 url: "{{ url('dosenkbk') }}/" + dataId,
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
