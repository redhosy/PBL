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

            $.get("{{ url('dakur') }}/" + itemId, function(response) {
                console.log(response);
                $('#detailModal').modal('show');
                // Assuming response.data contains the needed data
                $('#editDataId').text(response.data.id);
                $('#detailkode').text(response.data.kode_kurikulum);
                $('#detailkur').text(response.data.nama_kurikulum);
                $('#detaitahun').text(response.data.tahun);
                $('#detailprodi').text(response.data.prodi.prodi);
                // $('#detailstatus').text(response.data.status);

                let status = response.data.status;
                $('#detailstatus').attr('class', 'badge rounded-pill ' + (status == 1 ?
                        'bg-success text-light' : 'bg-danger text-light'))
                    .text(status == 1 ? 'Aktif' : 'Tidak Aktif');
            }).fail(function() {
                console.error('Failed to fetch data');
            });
        });

        // Pencarian
        // $('#searchButton').on('click', function() {
        //     let value = $('#searchInput').val().toLowerCase();
        //     $("#dataTable tr").filter(function() {
        //         var nama_kurikulum = $(this).find('td:nth-child(2)').text().toLowerCase();
        //         var tahun = $(this).find('td:nth-child(3)').text().toLowerCase();

        //         $(this).toggle(nama_kurikulum.indexOf(value) > -1 || tahun.indexOf(value) >
        //                 -1);
        //     });
        // });
        $('#dataTable').DataTable();
        //     $('#dataTable').DataTable({
        //     "processing": true,
        //     "paging": true,
        //     "searching": true,
        //     "responsive": true,
        //     "language": {
        //         "search": "cari"
        //     },
        //     "ajax": {
        //         "url": "getMatkulKurikulum", // Ganti dengan URL endpoint Anda
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
        //         { "data": "id_kurikulum", "orderable": true },
        //         { "data": "id_prodi", "orderable": true },
        //         { "data": "kode_kurikulum", "orderable": true },
        //         { "data": "nama_kurikulum", "orderable": true },
        //         { "data": "status", "orderable": true },
        //         { "data": "tahun", "orderable": true },
        //     ]
        // });

        var table = $('#dataTable').DataTable();

        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
