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

        //    detail
        $(document).on('click', '.detailBtn', function() {
            let itemId = $(this).data('id');

            console.log("Button clicked, data ID:", itemId);

            $.get("{{ url('dosenmatkul') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailnama').text(response.data[0].dosen.nama);
                $('#detailmatakuliah').text(response.data[0].matakuliah.nama_matakuliah);
                $('#detailkelas').text(response.data[0].kelas.nama_kelas);
                $('#detailsemester').text(response.data[0].semester.smt_thn_akd);
                // $('#detailModal').modal('show');
            }).fail(function(error) {
                console.error('Failed to fetch data');
                console.log(error)
            });
        });

        // Pencarian
        $('#dataTable').DataTable();

        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });
        // $('#searchButton').on('click', function() {
        //     let value = $('#searchInput').val().toLowerCase();
        //     $("#dataTable tr").filter(function() {
        //         var nama_matakuliah = $(this).find('td:nth-child(3)').text().toLowerCase();
        //         // var nama = $(this).find('td:nth-child(3)').text().toLowerCase();

        //         $(this).toggle(nama_matakuliah.indexOf(value) > -1);
        //     });
        // });

        //     $('#dataTable').DataTable({
        //     "processing": true,
        //     "paging": true,
        //     "searching": true,
        //     "responsive": true,
        //     "language": {
        //         "search": "cari"
        //     },
        //     "ajax": {
        //         "url": "getMataKuliah", // Ganti dengan URL endpoint Anda
        //         "type": "GET"
        //     },
        //     "columns": [
        //         {
        //             "data": null,
        //             "render": function (_data, _type, _row, meta) {
        //                 return meta.row + 1; // Nomor urut otomatis berdasarkan posisi baris
        //             },
        //             "orderable": false
        //         },
        //         { "data": "TP", "orderable": true },
        //         { "data": "id_kurikulum", "orderable": true },
        //         { "data": "id_matakuliah", "orderable": true },
        //         { "data": "jam", "orderable": true },
        //         { "data": "jam_praktek", "orderable": true },
        //         { "data": "jam_teori", "orderable": true },
        //         { "data": "kode_matakuliah", "orderable": true },
        //         { "data": "nama_matakuliah", "orderable": true },
        //         { "data": "semester", "orderable": true },
        //         { "data": "sks", "orderable": true },
        //         { "data": "sks_praktek", "orderable": true },
        //         { "data": "sks_teori", "orderable": true },
        //     ]
        // });

        //     var table = $('#dataTable').DataTable();

        //     $('#searchInput').on('keyup', function() {
        //         table.search(this.value).draw();
        //     });
    });
</script>
